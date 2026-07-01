<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Premium User Directory</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@2.0.8/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at 10% 20%, rgb(242, 246, 253) 0%, rgb(224, 233, 249) 90.1%);
            min-height: 100vh;
            color: #2d3748;
            padding: 2.5rem 0;
        }

        .table-card {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .table-card:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding-bottom: 1.25rem;
        }

        .page-header h1 {
            font-weight: 700;
            color: #1e293b;
            font-size: 1.85rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-badge {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%);
            color: white;
            font-size: 0.85rem;
            padding: 0.35rem 0.85rem;
            border-radius: 9999px;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(99, 102, 241, 0.2);
        }

        /* Custom Table Styles */
        #userTable {
            border-collapse: separate !important;
            border-spacing: 0 0.5rem !important;
            width: 100% !important;
        }

        #userTable thead th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            padding: 1.25rem 1rem;
            border: none;
        }

        #userTable tbody tr {
            background-color: #ffffff;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        #userTable tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.08);
            background-color: #fcfdfe !important;
        }

        #userTable tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            color: #334155;
            border-top: 1px solid #f1f5f9;
            border-bottom: 1px solid #f1f5f9;
        }

        #userTable tbody td:first-child {
            border-left: 1px solid #f1f5f9;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            font-weight: 600;
            color: #64748b;
        }

        #userTable tbody td:last-child {
            border-right: 1px solid #f1f5f9;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        /* Custom DataTable controls */
        .dt-search, .dataTables_filter {
            margin-bottom: 1.5rem;
            float: right;
            display: flex;
            align-items: center;
        }
        
        .dt-search input, .dataTables_filter input {
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 0.6rem 1rem !important;
            font-size: 0.9rem !important;
            min-width: 260px;
            transition: all 0.3s ease !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02) !important;
        }
        
        .dt-search input:focus, .dataTables_filter input:focus {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.15) !important;
            outline: none !important;
        }

        .dt-length, .dataTables_length {
            margin-bottom: 1.5rem;
            float: left;
        }

        .dt-length select, .dataTables_length select {
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 0.5rem 2rem 0.5rem 0.8rem !important;
            font-size: 0.9rem !important;
            transition: all 0.3s ease !important;
        }
        
        .dt-length select:focus, .dataTables_length select:focus {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1) !important;
            outline: none !important;
        }

        .dt-paging, .dataTables_paginate {
            float: right;
            margin-top: 1.5rem;
        }

        .dt-paging .pagination, .dataTables_paginate .pagination {
            gap: 5px;
            margin: 0;
        }

        .dt-paging .pagination .page-item .page-link, 
        .dataTables_paginate .pagination .page-item .page-link {
            border: 1px solid #e2e8f0;
            border-radius: 8px !important;
            color: #4f46e5;
            font-weight: 600;
            padding: 0.5rem 0.9rem;
            transition: all 0.2s ease;
            box-shadow: none;
        }

        .dt-paging .pagination .page-item.active .page-link,
        .dataTables_paginate .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #6366f1 0%, #4f46e5 100%) !important;
            border-color: transparent !important;
            color: white !important;
        }

        .dt-paging .pagination .page-item.active .page-link:hover,
        .dataTables_paginate .pagination .page-item.active .page-link:hover {
            box-shadow: 0 4px 10px rgba(99, 102, 241, 0.3) !important;
        }

        .dt-paging .pagination .page-item .page-link:hover,
        .dataTables_paginate .pagination .page-item .page-link:hover {
            background-color: #f8fafc;
            border-color: #cbd5e1;
            color: #4f46e5;
        }

        .dt-info, .dataTables_info {
            float: left;
            margin-top: 1.5rem;
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Custom Buttons */
        .btn-action-edit {
            background-color: #e0e7ff;
            color: #4f46e5;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .btn-action-edit:hover {
            background-color: #4f46e5;
            color: white;
        }

        .btn-action-delete {
            background-color: #fee2e2;
            color: #ef4444;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }

        .btn-action-delete:hover {
            background-color: #ef4444;
            color: white;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 45px rgba(0,0,0,0.15);
            background: #ffffff;
        }

        .modal-header {
            border-bottom: 1px solid #f1f5f9;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 700;
            color: #1e293b;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid #f1f5f9;
            padding: 1.25rem 1.5rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #cbd5e1;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table-card">
            <div class="page-header">
                <h1>
                    <i class="fa-solid fa-users text-primary me-2"></i>User List
                </h1>
                <div>
                    <span class="user-badge">{{ count($users) }} Records</span>
                </div>
            </div>

            <div class="table-responsive">
                <table id="userTable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold text-dark">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <button class="btn btn-action-edit edit-user me-2" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                </button>
                                <button class="btn btn-action-delete delete-user" data-id="{{ $user->id }}">
                                    <i class="fa-solid fa-trash me-1"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No users found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
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
                        <label class="form-label fw-semibold">Name</label>
                        <input type="text" id="user_name" class="form-control" oninput="document.getElementById('error-name').innerText=''">
                        <div class="text-danger mt-1" id="error-name"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" id="user_email" class="form-control" oninput="document.getElementById('error-email').innerText=''">
                        <div class="text-danger mt-1" id="error-email"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary px-4" id="updateUser">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables Core JS -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <!-- DataTables Bootstrap 5 JS Integration -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables with 1 record per page configuration
            const table = $('#userTable').DataTable({
                pageLength: 1,
                lengthMenu: [[1, 2, 5, 10, -1], [1, 2, 5, 10, "All"]],
                responsive: true,
                language: {
                    search: "",
                    searchPlaceholder: "Search users..."
                }
            });

            // Adjust search bar styles manually for Bootstrap if needed
            $('.dataTables_filter input').addClass('form-control form-control-sm');
        });

        // Delete user
        document.addEventListener('click', function(e) {
            let btn = e.target.closest('.delete-user');
            if (!btn) return;

            if (!confirm("Are you sure?")) return;

            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-1"></i> Processing...';
            btn.disabled = true;

            let id = btn.dataset.id;
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
                    if (data.success) {
                        // Use DataTables API to remove the row
                        let dt = $('#userTable').DataTable();
                        dt.row(btn.closest('tr')).remove().draw(false);
                        
                        // Update badge count
                        let currentCount = parseInt($('.user-badge').text());
                        if (!isNaN(currentCount) && currentCount > 0) {
                            $('.user-badge').text((currentCount - 1) + ' Records');
                        }
                    } else {
                        btn.innerHTML = '<i class="fa-solid fa-trash me-1"></i> Delete';
                        btn.disabled = false;
                    }
                })
                .catch(error => {
                    console.log(error);
                    btn.innerHTML = '<i class="fa-solid fa-trash me-1"></i> Delete';
                    btn.disabled = false;
                });
        });

        // Edit user Modal trigger
        document.addEventListener('click', function(e) {
            let btn = e.target.closest('.edit-user');
            if (!btn) return;

            document.getElementById('user_id').value = btn.dataset.id;
            document.getElementById('user_name').value = btn.dataset.name;
            document.getElementById('user_email').value = btn.dataset.email;

            let modal = new bootstrap.Modal(
                document.getElementById('editModal')
            );
            modal.show();
        });

        // Update user AJAX
        document.getElementById('updateUser').addEventListener('click', function() {
            let id = document.getElementById('user_id').value;
            let btn = document.getElementById('updateUser');
            btn.innerText = "Processing...";
            btn.disabled = true;
            const token = document.querySelector('meta[name="csrf-token"]').content;
            
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
                .then(async res => {
                    const data = await res.json();
                    console.log(data);
                    if (!res.ok) {
                        throw data;
                    }
                    return data;
                })
                .then(data => {
                    alert(data.message);
                    location.reload();
                })
                .catch(err => {
                    // Clear old errors first
                    document.getElementById('error-name').innerText = '';
                    document.getElementById('error-email').innerText = '';

                    if (err.errors) {
                        if (err.errors.name) {
                            document.getElementById('error-name').innerText = err.errors.name[0];
                        }
                        if (err.errors.email) {
                            document.getElementById('error-email').innerText = err.errors.email[0];
                        }
                    } else {
                        alert('Something went wrong');
                    }
                })
                .finally(() => {
                    btn.innerText = "Update";
                    btn.disabled = false;
                });
        });
    </script>
</body>

</html>