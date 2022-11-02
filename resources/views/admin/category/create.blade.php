@extends('layouts.app')
@section('content')
<div class="container">
  <div class="d-flex justify-content-end mb-2">
    <a href="{{ route('category.index')}}" class="btn btn-sm btn-primary">Back</a>
  </div>
      
  <div class="card p-4">
    @if (session()->has('success'))
      <strong class="text-success">{{session()->get('success')}}</strong>
    @endif
    <br>
    <form action="{{ route('category.store')}}" method="POST">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2">Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" placeholder="Category name" value="{{old('category_name')}}">
            @error('category_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div><br>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
  </div>
</div>
@endsection

