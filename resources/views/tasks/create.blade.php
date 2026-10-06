@extends('layouts.app')

@section('title', 'Create Task')

@section('content')

<div class="header">
    <div>
        <h1>Create New Task</h1>
        <p style="color: #6b7280; margin-top: 5px;">
            Add a new task to your project tracker.
        </p>
    </div>

    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
        ← Back
    </a>
</div>

<div class="card">

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="title">Task Title</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                placeholder="Enter task title"
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
                placeholder="Describe the task..."
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status">
                <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>
                    In Progress
                </option>

                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>
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
                <option value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }}>
                    Low
                </option>

                <option value="Medium" {{ old('priority', 'Medium') == 'Medium' ? 'selected' : '' }}>
                    Medium
                </option>

                <option value="High" {{ old('priority') == 'High' ? 'selected' : '' }}>
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
                value="{{ old('due_date') }}"
            >

            @error('due_date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Create Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection