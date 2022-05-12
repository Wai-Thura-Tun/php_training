let addURL = window.location.origin + "/api/add-employee";
let fullname;
let nickname;
let gender;
let dob;
let salary;
let position;
let depart;
let skyID;
let phone;
let email;
$(document).on('keyup change', function () {
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
});
function resetInput(data) {
  if (data.message == "Validation errors") {
    $('#fname').text(data.data.fname);
    $('#nname').text(data.data.nname);
    $('#dob').text(data.data.dob);
    $('#salary').text(data.data.salary);
    $('#position').text(data.data.position);
    $('#depart').text(data.data.depart);
    $('#phone').text(data.data.phone);
    $("#email").text(data.data.email);
    $('#skype').text(data.data.skype);
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

let editID = editApiData;
let editDataURL = window.location.origin + "/api/employee-lists/" + editID;
if (editID) {
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
  let updateURL = window.location.origin + "/api/update-employee/" + editID
  $('.ajaxAddBtn').on('click', function () {
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

  })
}
else {
  $('.ajaxAddBtn').on('click', function () {
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

  })
}