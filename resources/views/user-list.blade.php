<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div>
        <h1>User List</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <td>S.no</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Joined</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <button class="btn btn-primary">edit</button>
                        <button class="btn btn-warning delete-user" data-id="{{$user->id}}">delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No users found</td>
                </tr>
                @endforelse

            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('click', function (e) {
            console.log(e);
            

    let btn = e.target.closest('.delete-user');

    if (!btn) return;

    let id = btn.dataset.id;

    if (!confirm("Are you sure?")) return;

    fetch('/users/' + id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);

        if (data.status) {
            btn.closest('tr').remove();
        }
    });

});
    </script>
</body>

</html>