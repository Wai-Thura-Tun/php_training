const searchBtnTag = document.querySelector('.searchBtn');
const searchTag = document.querySelector('.searchInput');
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
$(document).ready(function () {
  function fetchFromApi() {
    let fetchURL = window.location.origin + "/api/employee-lists";
    $('.apiDataCon').html("");
    $.ajax({
      url: fetchURL,
      type: "GET",
      success: function (data) {
        $.each(data, function (key, value) {
          let editURL = "/api/edit/" + value.id;
          console.log(editURL);
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
  fetchFromApi();
  $(document).on('click', '.deletebtn', function (e) {
    e.preventDefault();
    let id = $(this).attr("did");
    let deleteURL = window.location.origin + "/api/delete-employee/" + id
    $.ajax({
      url: deleteURL,
      type: 'DELETE',
      success: function (data) {
        fetchFromApi();
        $('.apiStatus').text(data.message);
        $('.apiStatus').fadeIn('slow').delay(1000).fadeOut('slow');
      }
    })
  })

})