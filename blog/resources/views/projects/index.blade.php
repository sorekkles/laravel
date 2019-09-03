@extends('layout')

@section('title', 'Home')

@section('content')

<h1>My project by Johna</h1>

<ul>
    @foreach($projects as $project)
        <li>
            <a href="/projects/{{$project->id}}">
                {{ $project->title }}
            </a>
        </li>

    @endforeach
</ul>

<a href="/projects/create" class="btn btn-primary">Add new Project</a>

@endsection