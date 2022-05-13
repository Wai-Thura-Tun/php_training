const apiDomain = "http://127.0.0.1:8000";
const addURL = apiDomain + "/api/add-employee";
const editID = editApiData;
const updateURL = apiDomain + "/api/update-employee/" + editID
let fullname,
  nickname,
  gender,
  dob,
  salary,
  position,
  depart,
  skyID,
  phone,
  email;

function updateInput() {
  fullname = $('.fname').val();
  nickname = $('.nname').val();
  gender = $(".gender option:selected").text();
  dob = $('.dob').val();
  salary = $('.salary').val();
  position = $('.position').val();
  depart = $('.depart').val();
  phone = $('.phone').val();
  email = $(".email").val();
  skyID = $('.skype').val();
}

function resetInput(data) {
  if (data.message == "Validation errors") {
    $('#fname').text(data.data.fname ?? "");
    $('#nname').text(data.data.nname ?? "");
    $('#dob').text(data.data.dob ?? "");
    $('#salary').text(data.data.salary ?? "");
    $('#position').text(data.data.position ?? "");
    $('#depart').text(data.data.depart ?? "");
    $('#phone').text(data.data.phone ?? "");
    $("#email").text(data.data.email ?? "");
    $('#skype').text(data.data.skype ?? "");
    $('.errorbtn').each(function () {
      let text = $(this).text();
      if (text == "") {
        $(this).css('display', 'none');
      }
      else {
        $(this).css('display', 'inline-block');
      }
    })
  }
  else {
    $('.errorbtn').each(function () {
      $(this).css('display', 'none');
    })
    $('.fname').val("");
    $('.nname').val("");
    $('.dob').val("");
    $('.salary').val("");
    $('.position').val("");
    $('.depart').val("");
    $('.phone').val("");
    $(".email").val("");
    $('.skype').val("");
    $(".gender option:selected").text("Male");
  }
  $('.apiStatus').text(data.message);
  $('.apiStatus').fadeIn('slow').delay(1000).fadeOut('slow');
}

function getEditData(id) {
  let editDataURL = apiDomain + "/api/employee-lists/" + id;
  $.ajax({
    url: editDataURL,
    type: "GET",
    success: function (data) {
      $.each(data, function (key, value) {
        $('.fname').val(value.fullname);
        $('.nname').val(value.nickname);
        $('.dob').val(value.dob);
        $('.salary').val(value.empDetail.salary);
        $('.position').val(value.empDetail.position);
        $('.depart').val(value.empDetail.department);
        $('.phone').val(value.phone);
        $(".email").val(value.email);
        $('.skype').val(value.empDetail.skypeID);
        $('.empgender').each(function () {
          let genderValue = $(this).text();
          if (genderValue == value.gender) {
            $(this).attr("selected", "selected");
          }
        })
      })
      $('.inputttl').text('Edit Employee');
      $('.ajaxAddBtn').text("Update");
    }
  })
}

function updateData(updateURL) {
  $.ajax({
    url: updateURL,
    type: "PUT",
    data: {
      'fname': fullname,
      'gender': gender,
      'dob': dob,
      'nname': nickname,
      'phone': phone,
      'email': email,
      'salary': salary,
      'position': position,
      'depart': depart,
      'skype': skyID
    },
    success: function (data) {
      resetInput(data);
    }
  })
}

function addData() {
  $.ajax({
    url: addURL,
    type: "POST",
    data: {
      'fname': fullname,
      'gender': gender,
      'dob': dob,
      'nname': nickname,
      'phone': phone,
      'email': email,
      'salary': salary,
      'position': position,
      'depart': depart,
      'skype': skyID
    },
    success: function (data) {
      resetInput(data);
    }
  })
}
$(document).on('keyup change', function () {
  updateInput();
});

if (editID) {
  getEditData(editID);
  $('.ajaxAddBtn').on('click', function () {
    updateData(updateURL);
  })
}
else {
  $('.ajaxAddBtn').on('click', function () {
    addData();
  })
}