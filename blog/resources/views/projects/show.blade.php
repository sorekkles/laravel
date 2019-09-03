@extends('layout')


@section('content')

<h1>{{ $project->title}}</h1>
<div>
    {{$project->description}}
</div>

<a href="/projects/edit/{{$project->id}}">Edit</a>
@if($project->tasks->count())
    <h3>Tasks</h3>
    @foreach($project->tasks as $task)
        <form action="/tasks/{{$task->id}}" method="POST">
            @method('PATCH')
            @csrf
            <label for="completed" class="{{$task->completed ? 'is-complete' : ''}}">
                <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                {{$task->description}}
            </label>
        </form>
    @endforeach
@endif

{{-- task form--}}
<form method="POST" action="/project/{{$project->id}}/tasks" class="">
    @csrf
    @include('errors')
    <div>
        <label for="">New task</label>
        <input type="text" name="taskDescription" class="form-control" placeholder="New task" required>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Add task</button>
    </div>
</form>

@endsection