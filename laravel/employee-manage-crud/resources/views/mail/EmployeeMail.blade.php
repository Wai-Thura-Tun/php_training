<!DOCTYPE html>
<html>
  <head>
    <style>
      table {
        border-collapse: collapse;

      }
      table th,td {
        border: 1px solid #000;
      }

      table th {
        color: #2a733e;
      }
    </style>
  </head>
  <body>
    <div class="containers">
      <h2>{{ $details['title'] }}</h2>
      <h3>{{ $details['body'] }}</h3>
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
        </thead>
        <tbody>
          @foreach ($details['data'] as $list)
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html>