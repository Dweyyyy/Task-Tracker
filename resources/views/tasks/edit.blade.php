@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="header">
    <div>
        <h1>Edit Task</h1>
        <p style="color: #6b7280; margin-top: 5px;">
            Update the details of this task.
        </p>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
        ← Back
    </a>
</div>

<div class="card">

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Task Title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $task->title) }}"
            >

            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $task->description) }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status">

                <option value="Pending"
                    {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="In Progress"
                    {{ old('status', $task->status) == 'In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="Completed"
                    {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="priority">Priority</label>

            <select id="priority" name="priority">

                <option value="Low"
                    {{ old('priority', $task->priority) == 'Low' ? 'selected' : '' }}>
                    Low
                </option>

                <option value="Medium"
                    {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="High"
                    {{ old('priority', $task->priority) == 'High' ? 'selected' : '' }}>
                    High
                </option>

            </select>

            @error('priority')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}"
            >

            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection