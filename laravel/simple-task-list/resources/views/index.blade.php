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
      @if (isset($existTask))
        <div class="exist">Your Title is already exist.</div>
      @endif
      @if (isset($editTask)) 
      <form method="POST" action="/update-task">
        @csrf
        <label>Edit Task</label>
        <input type="hidden" name="uid" value="{{ $editTask->id }}" required>
        <input type="text" placeholder="Title" name="utitle" value="{{ $editTask->title }}" required>
        <input type="text" placeholder="Description" name="udetail" value="{{ $editTask->task }}" required>
        <button>Update</button>
      </form>
      @else
      <form method="POST" action="/add-task">
        @csrf
        <label>Add List</label>
        <input type="text" placeholder="Title" name="title" required>
        <input type="text" placeholder="Description" name="detail" required>
        <button>Add</button>
      </form>
      @endif
      <div class="listCon">
       @foreach ($data as $task)
       <div class="listItem">
        <div class="info">
          <div class="noinfo">
            {{ $task->id }}
            .
          </div>
          <a class="delete" href="/delete-task/{{ $task->id }}">
            <i class="fa fa-trash"></i>
          </a>
        </div>
      <div class="listttl">
        {{ $task->title }}
      </div>
      <div class="listdetail">
        {{ $task->task }}
      </div>
      <a class="editBtn" href="/edit-task/{{ $task->id }}">
        Edit
      </a>
    </div>
       @endforeach
    
      </div>
    </div>
    <script>
      $(document).ready(function(){
        $('.exist').show().delay(1000).hide();
        console.log($('.exist'))
      })
    </script>
  </body>
</html>