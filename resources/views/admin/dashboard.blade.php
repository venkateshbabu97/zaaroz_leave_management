<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <h2>Employee List</h2>
    <ul>
        @foreach($employees as $employee)
            <li>{{ $employee->name }} - {{ $employee->email }}</li>
        @endforeach
    </ul>
    <button>Add Employee</button>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
