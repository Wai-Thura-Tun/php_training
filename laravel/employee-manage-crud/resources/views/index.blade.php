<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
        <div class="elistcon">
          <div class="elttl">
            Employee List <span></span>
            <form class="searchform" method="GET">
              @csrf
              <input type="search" placeholder="Search By Name,Position,Department" name="search" class="searchInput">
              <button type="button" class="searchBtn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="emcebtn">
            <a href="{{ route('create') }}" class="eaddbtn">
              Create
            </a>
            <a href="{{ route('empexport') }}" class="eexpbtn">
              Export
            </a>
            <a href="{{ route('import') }}" class="eexpbtn">
              Import
            </a>
            <a href="{{ route('mail') }}" class="eexpbtn">
              Mail
            </a>
          </div>
        </div>
        @if (!empty($employeeList))
        <table>
          <thead>
            <th>ID</th>
            <th>Fullname</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Nickname</th>
            <th>Phone no.</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Postion</th>
            <th>Department</th>
            <th>Skype ID</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach ($employeeList as $list)
              <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->fullname }}</td>
                <td>{{ $list->gender }}</td>
                <td>{{ $list->dob }}</td>
                <td>{{ $list->nickname }}</td>
                <td>{{ $list->phone }}</td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->salary->salary }}</td>
                <td>{{ $list->salary->position }}</td>
                <td>{{ $list->salary->department }}</td>
                <td>{{ $list->salary->skyID }}</td>
                <td><a class="editbtn" href="{{ route('edit',['id' => $list->id ]) }}">Edit</a></td>
                <td><a class="deletebtn" href="{{ route('delete',['id' => $list->id ]) }}">Delete</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="pagi">
          {{ $employeeList->links()}}
        </div>
        @elseif (!empty($employee))
        <div class="searchResult">
          <div class="searchttl">
            Search Result : <span>{{ count($employee) }}</span>
          </div>
          <table>
            <thead>
              <th>ID</th>
              <th>Fullname</th>
              <th>Gender</th>
              <th>DOB</th>
              <th>Nickname</th>
              <th>Phone no.</th>
              <th>Email</th>
              <th>Salary</th>
              <th>Postion</th>
              <th>Department</th>
              <th>Skype ID</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead>
            <tbody>
              @foreach ($employee as $list)
              <tr>
                <th>{{ $list->id }}</th>
                <th>{{ $list->fullname }}</th>
                <th>{{ $list->gender }}</th>
                <th>{{ $list->dob }}</th>
                <th>{{ $list->nickname }}</th>
                <th>{{ $list->phone }}</th>
                <th>{{ $list->email }}</th>
                <th>{{ $list->salary->salary }}</th>
                <th>{{ $list->salary->position }}</th>
                <th>{{ $list->salary->department }}</th>
                <th>{{ $list->salary->skyID }}</th>
                <td><a class="editbtn" href="{{ route('edit',['id' => $list->id ]) }}">Edit</a></td>
                <td><a class="deletebtn" href="{{ route('delete',['id' => $list->id ]) }}">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="pagi">
            {{ $employee->links()}}
          </div>
        </div>
        @else
        <div class="nodata">No Data Found</div>
        @endif
    </div>
    <script>
      const searchBtnTag = document.querySelector('.searchBtn');
      const searchTag = document.querySelector('.searchInput');
      let value = "";
      searchTag.addEventListener('keyup', () => {
        value = searchTag.value;
      });
      searchBtnTag.addEventListener('click',() => {
        if (value) {
          const url = window.location.origin + "/search-employee?search=" + value;
          window.location.href = url;
        }
      });
      searchTag.addEventListener('keypress', function(e) {
        if (e.keyCode == 13) {
          e.preventDefault();
          if (value) {
            const url = window.location.origin + "/search-employee?search=" + value;
            window.location.href = url;
          }
        }
      });
    </script>
  </body>
</html>