
@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6 mt-4">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Category</h3>
              <div class="d-flex justify-content-end">
                <a href="{{ route('category.index')}}" class="btn btn-outline-info py-1"><i class="fas fa-angle-left right"></i> Back</a>
              </div>
            </div>
            
            <!-- /.card-header -->
            <!-- form start -->
            @if (session()->has('success'))
              <strong class="text-success">{{session()->get('success')}}</strong>
            @endif
            <br>
            <form action="{{route('cateory.update', $category->id)}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="">Category Name :</label>
                  <input type="text" class="form-control" name="category_name" value="{{ $category->category_name }}" required>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
