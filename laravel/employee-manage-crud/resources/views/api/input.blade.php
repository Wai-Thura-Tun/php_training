<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
      <div class="returncon">
        <div class="inputttl">
          Add New Employee
        </div>
        <a href="{{ route('api') }}">
          < Return To List
        </a>
      </div>
      <form method="POST" action="">
        @csrf
        <div class="inputCon">
          <label>Fullname:</label>
          <input type="" class="fname" value="">
        </div>
        <span class="errorbtn" id="fname"></span>
        <div class="inputCon">
          <label>Select Your Gender:</label>
          <select class="gender">
            <option class="empgender">Male</option>
            <option class="empgender">Female</option>
          </select>
        </div>
          <span class="errorbtn"></span>
        <div class="inputCon">
          <label>Pick Date of Birth:</label>
          <input type="date" class="dob" value="">
        </div>
          <span class="errorbtn" id="dob"></span>
        <div class="inputCon">
          <label>Nickname:</label>
          <input type="text" class="nname" value="">
        </div>
          <span class="errorbtn" id="nname"></span>
        <div class="inputCon">
          <label>Phone no:</label>
          <input type="text" class="phone" value="">
        </div>
          <span class="errorbtn" id="phone"></span>
        <div class="inputCon">
          <label>Email:</label>
          <input type="" class="email" value="">
        </div>
        <span class="errorbtn" id="email"></span>
        <div class="inputCon">
          <label>Salary</label>
          <input type="" class="salary" placeholder="e.g.$100" value="">
        </div>
        <span class="errorbtn" id="salary"></span>
        <div class="inputCon">
          <label>Position:</label>
          <input type="" class="position" value="">
        </div>
        <span class="errorbtn" id="position"></span>
        <div class="inputCon">
          <label>Department:</label>
          <input type="" class="depart" value="">
        </div>
        <span class="errorbtn" id="depart"></span>
        <div class="inputCon">
          <label>Skype ID:</label>
          <input type="" class="skype" placeholder="Skype ID" value="">
        </div>
        <span class="errorbtn" id="skype"></span>
        <button class="ajaxAddBtn" type="button">Submit</button>
      </form>
      <div class="apiStatus">
        Hello World
      </div>
    </div>
  </body>
  <script>
    let editApiData = {{ $editData ?? 0 }}
  </script>
  <script src="{{ url('/js/input.js') }}"></script>
</html>