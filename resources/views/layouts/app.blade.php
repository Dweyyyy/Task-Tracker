<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Task Tracker')</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #1f2937;
        }

        nav {
            background: #1f2937;
            padding: 18px 40px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            font-size: 30px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }

        .btn-danger {
            background: #dc2626;
            color: white;
        }

        .btn-success {
            background: #16a34a;
            color: white;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .stat h3 {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .stat p {
            font-size: 28px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f9fafb;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .progress {
            background: #dbeafe;
            color: #1e40af;
        }

        .completed {
            background: #dcfce7;
            color: #166534;
        }

        .low {
            background: #dcfce7;
            color: #166534;
        }

        .medium {
            background: #fef3c7;
            color: #92400e;
        }

        .high {
            background: #fee2e2;
            color: #991b1b;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 50%;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn svg {
            width: 18px;
            height: 18px;
        }

        .action-view {
            background: #e0edff;
            color: #2563eb;
        }

        .action-view:hover {
            background: #cfe1ff;
        }

        .action-edit {
            background: #dcfce7;
            color: #16a34a;
        }

        .action-edit:hover {
            background: #c8f5d6;
        }

        .action-delete {
            background: #fee2e2;
            color: #dc2626;
        }

        .action-delete:hover {
            background: #fecaca;
        }

        .task-title {
            font-weight: bold;
            color: #1f2937;
        }

        .task-description {
            margin-top: 5px;
            color: #6b7280;
            font-size: 13px;
            max-width: 300px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input, textarea, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
        }

        .description {
            line-height: 1.6;
            color: #4b5563;
        }

        .site-footer {
            text-align: center;
            padding: 25px 20px;
            margin-top: 40px;
            color: #6b7280;
            font-size: 14px;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 32px;
            background: #1f2937;
            color: white;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: 700;
        }

        .logout-btn {
            border: 1px solid rgba(255,255,255,0.3);
            background: transparent;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.1);
        }

        @media (max-width: 700px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            table {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="navbar-brand">
        Task Tracker
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">
            Logout
        </button>
    </form>
</nav>

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            <strong>Please fix the following errors:</strong>
            <ul style="margin-top: 8px; margin-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')

</div>

</body>

<footer class="site-footer">
    <p>&copy; {{ date('Y') }} Task Tracker. All rights reserved.</p>
</footer>
</html>