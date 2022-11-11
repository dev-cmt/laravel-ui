@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with Category</h3>
                  <div class="d-flex justify-content-end">
                    <a href="{{route('category.create')}}" class="text-white btn btn-outline-info py-1">Add New</a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $key=> $row )
                            <tr>
                                <th>{{++$key}}</th>
                                <td>{{$row->category_name}}</td>
                                <td>{{$row->category_slug}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-outline-success" href="{{route('category.edit', $row ->id)}}">Edit</a>
                                    <a class="btn btn-sm btn-outline-danger" id="delete" href="{{route('category.destroy', $row ->id)}}">Delete</a>
                                </td>
                            </tr>  
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

@endsection
