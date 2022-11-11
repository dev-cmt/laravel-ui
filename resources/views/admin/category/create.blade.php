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
              <h3 class="card-title">Create Category</h3>
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
            <form action="{{ route('category.store')}}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="">Category Name :</label>
                  <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" placeholder="Category name" value="{{old('category_name')}}">
                  @error('category_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
