@extends('books.layout')

@section('content')
<div class="pull-left">
    <h2>Student Crud Step by Step</h2>
</div>

<div class="row">
    <div class="col-lg-12 margin-tb">
        

        <div class="pull-right">
            <a class="btn btn-success" href="{{route('books.create')}}">Create New Student</a>

</div>
</div>
</div>

@if($message=Session::get('successs'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Fee</th>
        <th width="280px">Action</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{++$i}}</td>
        <td>{{ $book->studname}}</td>
        <td>{{ $book->course}}</td>
        <td>{{ $book->fee}}</td>
        <td>
            <form action="{{route('books.destroy',$book->id)}}"method="POST">
            
            

            <a class = "btn btn-primary" href="{{route('books.edit' , $book->id)}}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>