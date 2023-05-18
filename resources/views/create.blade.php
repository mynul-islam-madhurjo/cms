<!DOCTYPE html>
<html>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<head>
    <title>Create User</title>
</head>
<body>
<h1>Create User</h1>

@if ($errors->any())
    <div>
        <strong>Error:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
    </div>


    <div>
        <label for="id">User ID:</label>
        <input type="text" name="id" id="id" value="{{ old('id') }}" required>
    </div>

    <div>
        <label for="start_date">Start Date:</label>
        <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
    </div>

    <div>
        <label for="end_date">End Date:</label>
        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
    </div>

    <div>
        <button type="submit">Create</button>
    </div>
</form>
</body>
</html>
