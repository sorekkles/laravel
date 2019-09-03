@extends('layout')


@section('content')

<h1>Edit Project</h1>
    <form action="/projects/{{ $project->id}}" method="POST">
        @method('PATCH')
        @csrf
        @include('errors')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" value="{{ $project->title}}" class="form-control">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $project->description}} </textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    <form action="/projects/{{$project->id }}" method="post">
        @method('DELETE')
        @csrf
        <div>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
@endsection