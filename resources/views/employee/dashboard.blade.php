<!DOCTYPE html>
<html>
<head>
    <title>Employee Dashboard</title>
</head>
<body>
    <h1>Employee Dashboard</h1>
    <h2>Your Details</h2>
    <p>Name: {{ $employee->name }}</p>
    <p>Email: {{ $employee->email }}</p>
    <button>Apply for Leave</button>
    <button>Edit Details</button>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
