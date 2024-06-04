@extends('layouts.app')

@section('content') 
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">

       
        <div class="container">
            <table class="table table-auto table-bordered" id="client-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script>
        $(document).ready(function () {
            $('#client-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('clients-list') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user_id', name: 'user_id' },
                    { data: 'client_first_name', name: 'client_first_name' },
                    { data: 'client_last_name', name: 'client_last_name' },
                    { data: 'client_middle_name', name: 'client_middle_name' },
                    { data: 'client_contact_num', name: 'client_contact_num' },
                    { data: 'client_address', name: 'client_address' },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            let editUrl = "{{ route('clients.edit', ':id') }}".replace(':id', row.id);
                            let deleteUrl = "{{ route('clients.destroy', ':id') }}".replace(':id', row.id);
                            let viewUrl = "{{ route('clients.view', ':id') }}".replace(':id', row.id);
                            
    
                            return '<a href="' + editUrl + '" class="btn btn-primary">Edit</a> ' +
                                '<form id="deleteForm_' + row.id + '" method="POST" action="'  + '"> ' +
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}"> ' + '</form>'+
                                '<a href="' + viewUrl + '" class="btn btn-info">View</a>';
                        }
    
                    }
                ]
            });
        });
    </script> 
@endsection
