<!DOCTYPE html>
<html>
<head>
    <title>Roles Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Roles Management</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('admin.roles') }}">
        @csrf
        <div class="form-group">
            <label for="name">Role Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Role</button>
    </form>
    <h3>Existing Roles</h3>
    <ul class="list-group">
        @foreach($roles as $role)
            <li class="list-group-item">
                {{ $role->name }}

                <!-- Form to assign permissions -->
                <form method="POST" action="{{ route('admin.roles.assignPermissions', $role->id) }}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="permissions">Assign Permissions</label>
                        <select multiple class="form-control" id="permissions" name="permissions[]">
                            @foreach($permissions as $permission)
                                <option value="{{ $permission->id }}"
                                    {{ $role->permissions->contains($permission->id) ? 'selected' : '' }}>
                                    {{ $permission->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Assign Permissions</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
