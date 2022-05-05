<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
      <form method="POST" action="@if(isset($editTask)) {{ route('taskupdate',['id' => $editTask->id ]) }} @else {{ route('taskadd') }} @endif">
        @csrf
        <label>@if(isset($editTask)) Edit List @else Add List @endif</label>
        <input type="text" placeholder="Title" name="title" value="{{ $editTask->title ?? ''}}">
        @error('title')
        <span class="errorcon">{{ $message }}</span>          
        @enderror
        <input type="text" placeholder="Description" name="detail" value="{{ $editTask->detail ?? ''}}">
        @error('detail')
        <span class="errorcon">{{ $message }}</span>
        @enderror
        <button>@if(isset($editTask)) Update @else Add @endif</button>
      </form>
      <div class="listCon">
        @if (isset($taskList))
        @foreach ($taskList as $task)
        <div class="listItem">
         <div class="info">
           <div class="noinfo">
             {{ $task->id }} .
           </div>
           <a class="delete" href="{{ route('taskdelete',['id' => $task->id]) }}">
             <i class="fa fa-trash"></i>
           </a>
         </div>
       <div class="listttl">
         {{ $task->title }}
       </div>
       <div class="listdetail">
         {{ $task->detail }}
       </div>
       <a class="editBtn" href="{{ route('taskedit',['id' => $task->id]) }}">
         Edit
       </a>
     </div>
        @endforeach
        @endif    
      </div>
    </div>
  </body>
</html>