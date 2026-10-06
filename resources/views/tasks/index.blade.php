@extends('layouts.app')

@section('title', 'Task Tracker')

@section('content')

<div class="header">
    <div>
        <h1>Task Tracker</h1>
        <p style="color: #6b7280; margin-top: 5px;">
            Manage your projects and tasks in one place.
        </p>
    </div>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Add Task
    </a>
</div>

<div class="stats">
    <div class="stat">
        <h3>Total Tasks</h3>
        <p>{{ $tasks->count() }}</p>
    </div>

    <div class="stat">
        <h3>Pending</h3>
        <p>{{ $tasks->where('status', 'Pending')->count() }}</p>
    </div>

    <div class="stat">
        <h3>Completed</h3>
        <p>{{ $tasks->where('status', 'Completed')->count() }}</p>
    </div>
</div>

<div class="card">

    @if($tasks->count() > 0)

        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($tasks as $task)

                    <tr>
                        <td>
                            <div class="task-title">
                                {{ $task->title }}
                            </div>

                            <div class="task-description">
                                {{ Str::limit($task->description, 40) }}
                            </div>
                        </td>

                        <td>
                            <span class="badge {{ strtolower($task->priority) }}">
                                {{ $task->priority }}
                            </span>
                        </td>

                        <td>
                            <span class="badge
                                {{ $task->status === 'Pending' ? 'pending' : '' }}
                                {{ $task->status === 'In Progress' ? 'progress' : '' }}
                                {{ $task->status === 'Completed' ? 'completed' : '' }}">
                                {{ $task->status }}
                            </span>
                        </td>

                        <td>
                            {{ $task->due_date->format('M d, Y') }}
                        </td>

                        <td>
                            <div class="actions">

                                {{-- View --}}
                                <a href="{{ route('tasks.show', $task) }}"
                                class="action-btn action-view"
                                title="View task"
                                aria-label="View task">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12s-3.75 6.75-9.75 6.75S2.25 12 2.25 12Z" />

                                        <circle cx="12"
                                                cy="12"
                                                r="2.75" />

                                    </svg>
                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('tasks.edit', $task) }}"
                                class="action-btn action-edit"
                                title="Edit task"
                                aria-label="Edit task">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="2"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M19.5 7.125 16.875 4.5" />

                                    </svg>
                                </a>


                                {{-- Delete --}}
                                <form action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="action-btn action-delete"
                                            title="Delete task"
                                            aria-label="Delete task">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="2"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673A2.25 2.25 0 0 1 15.916 21H8.084a2.25 2.25 0 0 1-2.244-1.327L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12.576 0c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0C8.91 2.198 8 3.182 8 4.362v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />

                                        </svg>

                                    </button>

                                </form>

                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    @else

        <div style="text-align: center; padding: 50px;">
            <h2>No tasks yet</h2>
            <p style="color: #6b7280; margin: 10px 0 20px;">
                Start by creating your first task.
            </p>

            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                Create Your First Task
            </a>
        </div>

    @endif

</div>

@endsection