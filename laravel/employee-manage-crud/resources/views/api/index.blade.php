<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            <a href="{{ route('api-create') }}" class="eaddbtn">
              Create
            </a>
            <a href="{{ route('empexport') }}" class="eexpbtn">
              Export
            </a>
            <a href="{{ route('import') }}" class="eexpbtn">
              Import
            </a>
          </div>
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
          <tbody class="apiDataCon">

          </tbody>
        </table>
        <div class="apiStatus">
          Hello World
        </div>
    </div>
    <script src="{{ url('/js/index.js') }}"></script>
  </body>
</html>