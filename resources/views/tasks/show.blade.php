@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

<div class="header">
    <div>
        <h1>Task Details</h1>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
        ← Back to Tasks
    </a>
</div>

<div class="card">

    <h2>{{ $task->title }}</h2>

    <p class="description" style="margin-top: 15px;">
        {{ $task->description }}
    </p>

    <div style="margin-top: 25px;">

        <p style="margin-bottom: 12px;">
            <strong>Status:</strong>

            <span class="badge
                {{ $task->status === 'Pending' ? 'pending' : '' }}
                {{ $task->status === 'In Progress' ? 'progress' : '' }}
                {{ $task->status === 'Completed' ? 'completed' : '' }}">
                {{ $task->status }}
            </span>
        </p>

        <p style="margin-bottom: 12px;">
            <strong>Priority:</strong>

            <span class="badge {{ strtolower($task->priority) }}">
                {{ $task->priority }}
            </span>
        </p>

        <p>
            <strong>Due Date:</strong>
            {{ $task->due_date->format('F d, Y') }}
        </p>

    </div>

    <div style="margin-top: 25px;">

        <a href="{{ route('tasks.edit', $task) }}"
           class="btn btn-primary">
            Edit Task
        </a>

        <form action="{{ route('tasks.destroy', $task) }}"
              method="POST"
              style="display: inline;"
              onsubmit="return confirm('Are you sure you want to delete this task?');">

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Delete Task
            </button>

        </form>

    </div>

</div>

@endsection