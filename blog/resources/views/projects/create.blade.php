@extends('layout')

@section('title', 'Create Project')


@section('content')

<form action="/projects" method="POST">
    @csrf
    <h3>Create new Project</h3>
    @include('errors')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title')}}" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="" cols="30" rows="10" required>{{ old('description')}}</textarea>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Add Project</button>
    </div>
</form>

@endsection