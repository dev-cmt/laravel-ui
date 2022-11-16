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
              <h3 class="card-title">Create Post</h3>
              <div class="d-flex justify-content-end">
                <a href="{{ route('subcategory.index')}}" class="btn btn-outline-info py-1"><i class="fas fa-angle-left right"></i> Back</a>
              </div>
            </div>
            <!-- /.card-header -->
            
            @if (session()->has('success'))
              <strong class="text-success">{{session()->get('success')}}</strong>
            @endif
            <br>
            <!-- form start -->
            <form action="#" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="">Post Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Post Title" value="{{old('title')}}">
                  @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                    @foreach ($category as $cat)
                      @php
                       $subcategories=DB::table('subcategories')->where('category_id',$cat->id)->get();   
                      @endphp 
                      <option value="{{$cat->id}}">{{ $cat->category_name }}</option>
                      @foreach($subcategories as $sub)
                      <option value="{{$sub->id}}">---{{ $sub->subcategory_name }}</option>
                      @endforeach
                    @endforeach
                  </select>
                </div>
                {{-- <div class="form-group">
                  <label>Sub Category</label>
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                    @foreach ($category as $row)
                      <option value="{{$row->id}}">{{ $row->category_name }}</option>
                    @endforeach
                  </select>
                </div> --}}
                
                <div class="form-group">
                  <label for="">Post Date</label>
                  <input type="text" class="form-control @error('post_date') is-invalid @enderror" name="post_date" placeholder="Post Date" value="{{old('post_date')}}">
                  @error('post_date')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Tags</label>
                  <input type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" placeholder="Post Date" value="{{old('tags')}}">
                  @error('tags')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" id="" rows="5" @error('description') is-invalid @enderror value="{{old('description')}}"></textarea>
                  @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input @error('status') is-invalid @enderror" name="status" placeholder="Post Date" value="1">
                  <label class="form-check-label">Published Now</label>
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

