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
    <form action="{{route('subcategory.update', $data->id)}}" method="POST">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2">Category Name</label>
          <div class="col-sm-6">
            <select name="categories_id" class="form-control">
              @foreach ($category as $row)
                <option value="{{$row->id}}" @if ($row->id==$data->categories_id) selected  @endif>{{ $row->category_name }}</option>
              @endforeach
            </select>
          </div>
        </div><br>
        <div class="form-group row">
          <label class="col-sm-2">Sub Category Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" placeholder="Sub Category name" value="{{$data->subcategory_name}}">
            @error('subcategory_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div><br>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>
</div>
@endsection






