<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <button class="btn btn-primary edit-user" data-id="{{$user->id}}" data-name="{{$user->name}}" data-email="{{$user->email}}">edit</button>
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

    <!-- modal  -->

    <div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" id="user_id">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" id="user_name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" id="user_email" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-success" id="updateUser">
                    Update
                </button>
            </div>

        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('click', function (e) {
            

    let btn = e.target.closest('.delete-user');
    btn.innerText="Processing";
    btn.disable=true;

    if (!btn) return;

    let id = btn.dataset.id;

    if (!confirm("Are you sure?")) return;
    const token = document.querySelector('meta[name="csrf-token"]').content;

    fetch('/delete/users/' + id, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        
        if(data.success){
            btn.closest('tr').remove();

        }
        else{
            btn.innerText="delete";
            btn.disable=false;
        }

    })
    .catch(error => {
        console.log(error);
         btn.innerText="delete";
            btn.disable=false;  
        
    });

});

//edit user
document.addEventListener('click', function(e){

    let btn = e.target.closest('.edit-user');

    if(!btn) return;

    document.getElementById('user_id').value = btn.dataset.id;
    document.getElementById('user_name').value = btn.dataset.name;
    document.getElementById('user_email').value = btn.dataset.email;

    let modal = new bootstrap.Modal(
        document.getElementById('editModal')
    );

    modal.show();
});

document.getElementById('updateUser').addEventListener('click', function(){

    let id = document.getElementById('user_id').value;

    const token = document.querySelector(
        'meta[name="csrf-token"]'
    ).content;

    fetch('/update/users/' + id, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            name: document.getElementById('user_name').value,
            email: document.getElementById('user_email').value
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        location.reload();
    });
});
    </script>
</body>

</html>