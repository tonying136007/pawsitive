
@extends('layouts.app')

@section('content')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="container">
            <table class="table table-auto table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('accounts-list') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'username', name: 'username' },
                    { data: 'user_type_id', name: 'user_type_id' },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                        let editUrl = row.edit_url;
                        let deleteUrl = "{{ route('users.destroy', ':id') }}".replace(':id', row.id);

                        return '<a href="' + editUrl + '" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a> ' +
                            '<form id="deleteForm_' + row.id + '" method="POST" action="' + deleteUrl + '"> ' +
                            '<input type="hidden" name="_token" value="{{ csrf_token() }}"> ' +
                            '<input type="hidden" name="_method" value="DELETE"> ' +
                            '<button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Del</button> ' +
                            '</form>';
                    }

                    }
                ]
            });
        });
    </script>
@endsection