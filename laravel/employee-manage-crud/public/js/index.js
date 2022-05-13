const searchBtnTag = document.querySelector('.searchBtn');
const searchTag = document.querySelector('.searchInput');
const apiDomain = "http://127.0.0.1:8000";
const fetchURL = apiDomain + "/api/employee-lists";
let value = "";
searchTag.addEventListener('keyup', () => {
  value = searchTag.value;
});
searchBtnTag.addEventListener('click', () => {
  if (value) {
    const url = window.location.origin + "/search-employee?search=" + value;
    window.location.href = url;
  }
});
searchTag.addEventListener('keypress', function (e) {
  if (e.keyCode == 13) {
    e.preventDefault();
    if (value) {
      const url = window.location.origin + "/search-employee?search=" + value;
      window.location.href = url;
    }
  }
});

function fetchFromApi() {
  $('.apiDataCon').html("");
  $.ajax({
    url: fetchURL,
    type: "GET",
    success: function (data) {
      $.each(data, function (key, value) {
        let editURL = "/api/edit/" + value.id;
        $('.apiDataCon').append(`
              <tr>
              <th>${value.id}</th>
              <th>${value.fullname}</th>
              <th>${value.gender}</th>
              <th>${value.dob}</th>
              <th>${value.nickname}</th>
              <th>${value.phone}</th>
              <th>${value.email}</th>
              <th>${value.empDetail.salary}</th>
              <th>${value.empDetail.position}</th>
              <th>${value.empDetail.department}</th>
              <th>${value.empDetail.skypeID}</th>
              <td><a class="editbtn" eid="${value.id}" href=${editURL}>Edit</a></td>
              <td><a class="deletebtn" did="${value.id}" href="">Delete</a></td>
            </tr>`
        )
      });
    }
  })
}

function deleteFromApi(e) {
  e.preventDefault();
  let id = $(this).attr("did");
  let deleteURL = apiDomain + "/api/delete-employee/" + id
  $.ajax({
    url: deleteURL,
    type: 'DELETE',
    success: function (data) {
      fetchFromApi(apiDomain);
      $('.apiStatus').text(data.message);
      $('.apiStatus').fadeIn('slow').delay(1000).fadeOut('slow');
    }
  })
}
$(document).ready(function () {
  fetchFromApi(apiDomain);
  $(document).on('click', '.deletebtn', function (e) {
    deleteFromApi(e);
  })
})