<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body>
    <div class="container">
      <div class="returnbtn">
        <a href="{{ route('home') }}">< Return To List</a>
      </div>
      <form class="importform" method="POST" enctype="multipart/form-data" action="{{ route('empimport') }}">
        @csrf
        <label>Import Your Excel File</label>
        <input type="file" name="file">
        @error('file')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <button>Import</button>
      </form>
    </div>
  </body>
</html>