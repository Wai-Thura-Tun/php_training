<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
      <div class="completeCon">
        <h2>Mail has been sent successfully.</h2>
        <h3>Check Your Email</h3>
        <p>Thank you.</p>
      </div>
      <a class="comreturn" href="{{ route("home") }}">
        < Home
      </a>
    </div>
  </body>
</html>