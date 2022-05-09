<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
  </head>
  <body>
    <div class="container">
      <div class="returncon">
        <div>
          @if (isset($editData)) Edit Employee @else Add New Employee @endif
        </div>
        <a href="{{ route('home') }}">
          < Return To List
        </a>
      </div>
      <form method="POST" action="@if(isset($editData))@foreach($editData as $list){{ route('update',['id' => $list->id, 'eid' => $list->sid]) }}@endforeach @else{{ route('add') }}@endif">
        @csrf
        <div class="inputCon">
          <label>Fullname:</label>
          <input type="" name="fname" value="@if (isset($editData))@foreach ($editData as $list){{ $list->fullname ?? '' }}@endforeach @else {{ old('fname') ?? '' }}@endif">
        </div>
        @error('fname')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Select Your Gender:</label>
          <select name="gender">
            <option @if(isset($editData)) @foreach($editData as $list){{ $list->gender == 'Male' ? 'selected' : ''}}@endforeach @else {{old('gender') == 'Male' ? 'selected' : ''}} @endif">Male</option>
            <option @if(isset($editData)) @foreach($editData as $list){{ $list->gender == 'Female' ? 'selected' : ''}}@endforeach @else {{old('gender') == 'Female' ? 'selected' : ''}} @endif">Female</option>
          </select>
        </div>
        @error('gender')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Pick Date of Birth:</label>
          <input type="date" name="dob" value="@if(isset($editData))@php foreach($editData as $list){echo$list->dob;}@endphp@else{{ old('dob') ?? '' }}@endif">
        </div>
        @error('dob')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Nickname:</label>
          <input type="text" name="nname" value="@if (isset($editData))@foreach ($editData as $list){{ $list->nickname ?? '' }}@endforeach @else {{ old('nname') ?? '' }}@endif">
        </div>
        @error('nname')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Phone no:</label>
          <input type="text" name="phone" value="@if (isset($editData))@foreach ($editData as $list){{ $list->phone ?? '' }}@endforeach @else {{ old('phone') ?? '' }}@endif">
        </div>
        @error('phone')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Email:</label>
          <input type="" name="email" value="@if (isset($editData))@foreach ($editData as $list){{ $list->email ?? '' }}@endforeach @else {{ old('email') ?? '' }}@endif">
        </div>
        @error('email')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Salary</label>
          <input type="" name="salary" placeholder="e.g.$100" value="@if (isset($editData))@foreach ($editData as $list){{ $list->salary ?? '' }}@endforeach @else {{ old('salary') ?? '' }}@endif">
        </div>
        @error('salary')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Position:</label>
          <input type="" name="position" value="@if (isset($editData))@foreach ($editData as $list){{ $list->position ?? '' }}@endforeach @else {{ old('position') ?? '' }}@endif">
        </div>
        @error('position')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Department:</label>
          <input type="" name="depart" value="@if (isset($editData))@foreach ($editData as $list){{ $list->department ?? '' }}@endforeach @else {{ old('depart') ?? '' }}@endif">
        </div>
        @error('depart')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <div class="inputCon">
          <label>Skype ID:</label>
          <input type="" name="skype" placeholder="Skype ID" value="@if (isset($editData))@foreach ($editData as $list){{ $list->skyID ?? '' }}@endforeach @else {{ old('skype') ?? '' }}@endif">
        </div>
        @error('skype')
          <span class="errorbtn">{{ $message }}</span>
        @enderror
        <button>@if (isset($editData)) Update @else Submit @endif</button>
      </form>
    </div>
  </body>
</html>