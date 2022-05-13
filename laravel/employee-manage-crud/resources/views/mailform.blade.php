<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
      <a class="mailreturn" href="{{ route('home') }}">
        < Home
      </a>
      <form method="POST" class="mailform" action="{{ route('sendmail') }}">
        @csrf
        <label>Enter your email,we will sent you latest employee.</label>
        <input type="email" name="mail" placeholder="Your email">
        <button>Send</button>
      </form>
    </div>
  </body>
</html>