@extends('layouts.app')
@section('content')
<!--Class View Page-->
<div class="container">
    <div class="d-flex justify-content-end">
        <a href="{{route('students.create')}}" class="btn btn-sm btn-primary mb-2">Create</a>
    </div>
    <div class="">
        @if (session()->has('success'))
            <strong class="text-success">{{session()->get('success')}}</strong>
        @endif
        <table class="table table-striped">
            <thead class="bg-dark text-white">
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-2">Name</th>
                    <th class="col-1">Roll</th>
                    <th class="col-3">Phone</th>
                    <th class="col-2">Email</th>
                    <th class="col-1">Class</th>
                    <th class="col-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $key=> $row )
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->roll}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->class_name}}</td>
                        <td class="d-flex justify-content-center text-center">
                            <a class="btn btn-sm btn-outline-info" href="{{route('students.show',$row ->id)}}">View</a>
                            <a class="btn btn-sm btn-outline-success mx-2" href="{{route('students.edit',$row ->id)}}">Edit</a>
                            <form action="{{route('students.destroy', $row->id )}}" method="POST">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>  
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>

@endsection
