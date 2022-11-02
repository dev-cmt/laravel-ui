@extends('layouts.app')
@section('content')
<div class="container">
  <!---Student Page---->
      
  <div class="card p-4">
    @if (session()->has('success'))
      <strong class="text-success">{{session()->get('success')}}</strong>
    @endif
    <form action="" method="POST">
        @csrf
        <input type="hidden" value="PATCH" name="_method">
        
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-6">
          <select class="form-control" name="class_id">
            <option selected>Select Classes</option>
            @foreach ($class as $row)
                <option value="{{$row ->id}}" @if ($row->id == $student->class_id) selected @endif>{{ $row -> class_name }}</option>
            @endforeach
          </select>
        </div>
      </div><br>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="name"  value="{{ $student ->name}}">
        </div>
      </div><br>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Roll</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="roll"  value="{{ $student ->roll}}">
        </div>
      </div><br>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="phone"  value="{{ $student ->phone}}">
        </div>
      </div><br>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="email"  value="{{ $student ->email}}">
        </div>
      </div><br>
      <a href="{{ route('students.index')}}" class="btn btn-primary">Back</a>
  </form>
  </div>
</div>
@endsection