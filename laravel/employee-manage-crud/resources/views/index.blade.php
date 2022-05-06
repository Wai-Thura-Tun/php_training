<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
        <div class="elistcon">
          <div class="elttl">
            Employee List <span>({{ count($employeeList) ?? '' }})</span>
          </div>
          <a href="{{ route('create') }}" class="eaddbtn">
            Create
          </a>
        </div>
        @if (count($employeeList) > 0)
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
                <th>{{ $list->id }}</th>
                <th>{{ $list->fullname }}</th>
                <th>{{ $list->gender }}</th>
                <th>{{ $list->dob }}</th>
                <th>{{ $list->nickname }}</th>
                <th>{{ $list->phone }}</th>
                <th>{{ $list->email }}</th>
                <th>{{ $list->salary }}</th>
                <th>{{ $list->position }}</th>
                <th>{{ $list->department }}</th>
                <th>{{ $list->skyID }}</th>
                <td><a class="editbtn" href="{{ route('edit',['id' => $list->id ]) }}">Edit</a></td>
                <td><a class="deletebtn" href="{{ route('delete',['id' => $list->id ]) }}">Delete</a></td>s
              </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="nodata">No Data Found</div>
        @endif
        
    </div>
  </body>
</html>