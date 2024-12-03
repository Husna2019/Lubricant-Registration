<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Roles</title>
</head>
<body>
    <h1>User: {{ $user->name }}</h1>
    <h2>Roles:</h2>
    <ul>
        @foreach ($roleNames as $role)
            <li>{{ $role }}</li>
        @endforeach
    </ul>
</body>
</html>
