@extends('layouts.app')
@section('content')
<div class="container">
  <!---Product Page---->
  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('students.index')}}" class="btn btn-sm btn-primary">View All Students</a>
  </div>
      
  <div class="card p-4">
    @if (session()->has('success'))
      <strong class="text-success">{{session()->get('success')}}</strong>
    @endif
    <form action="{{ route('students.store')}}" method="POST">
      @csrf
      <div class="form-group row">
        
        <label class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-6">
          <select class="form-control" name="class_id">
            <option selected>Select Classes</option>
            @foreach ($class as $row)
                <option value="{{$row ->id}}">{{ $row -> class_name }}</option>
            @endforeach
          </select>
        </div>
      </div><br>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Student name" value="{{old('name')}}">
          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror   
        </div>
      </div><br>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Roll</label>
        <div class="col-sm-6">
          <input type="number" class="form-control @error('roll') is-invalid @enderror" name="roll" placeholder="Student Roll" value="{{old('roll')}}">
          @error('roll')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
      </div><br>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-6">
          <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Student number" value="{{old('phone')}}">
          @error('phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
      </div><br>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Student email" value="{{old('email')}}">
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
      </div>
      <button type="submit" class="btn btn-success mt-4">Submit</button>
  </form>
  </div>
</div>
@endsection