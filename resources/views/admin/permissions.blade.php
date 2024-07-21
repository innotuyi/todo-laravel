<!DOCTYPE html>
<html>
<head>
    <title>Permissions Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Permissions Management</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.permissions') }}">
        @csrf
        <div class="form-group">
            <label for="name">Permission Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Permission</button>
    </form>
    <h3>Existing Permissions</h3>
    <ul class="list-group">
        @foreach($permissions as $permission)
            <li class="list-group-item">{{ $permission->name }}</li>
        @endforeach
    </ul>
</div>
</body>
</html>
