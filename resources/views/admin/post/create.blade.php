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
                <a href="{{ route('subcategory.index')}}" class="btn btn-outline-info py-1"><i class="fas fa-angle-left right"></i> Back</a>
              </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if (session()->has('success'))
              <strong class="text-success">{{session()->get('success')}}</strong>
            @endif
            <br>
            <form action="#" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Category Name</label>
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                    @foreach ($category as $row)
                      <option value="{{$row->id}}">{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Sub Category Name :</label>
                  <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" name="subcategory_name" placeholder="Sub Category name" value="{{old('subcategory_name')}}">
                  @error('subcategory_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
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

