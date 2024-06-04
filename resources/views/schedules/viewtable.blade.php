@extends('layouts.app')


@section('content')

<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add User</button>
        </form>

       
        <div class="container">
            <table class="table table-auto table-bordered" id="schedules-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User ID</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Subject</th>
                        <th>Type</th>
                        <th>Doctor</th>
                        <th>Diagnostic ID</th>
                        <th>Pet ID</th>
                        <th>Created At</th>
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
            $('#schedules-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('schedules-list') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'user_id', name: 'user_id' },
                    { data: 'start_time', name: 'start_time' },
                    { data: 'finish_time', name: 'finish_time' },
                    { data: 'comments', name: 'comments' },
                    { data: 'type', name: 'type' },
                    { data: 'doctor', name: 'doctor' },
                    { data: 'diagnosis_id', name: 'diagnosis_id' },
                    { data: 'pet_id', name: 'pet_id' },
                    { data: 'created_at', name: 'created_at' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function (data, type, row) {
                            let editUrl = "{{ route('schedules.edit', ':id') }}".replace(':id', row.id);
                            let deleteUrl = "{{ route('schedules.destroy', ':id') }}".replace(':id', row.id);
                            
    
                            return '<a href="' + editUrl + '" class="btn btn-primary">Edit</a> ' +
                                '<form id="deleteForm_' + row.id + '" method="POST" action="' + deleteUrl + '"> ' +
                                '<input type="hidden" name="_token" value="{{ csrf_token() }}"> ' +
                                '<input type="hidden" name="_method" value="DELETE"> ' +
                                '<button type="submit" class="btn btn-danger">Delete</button> ' +
                                '</form>';
                        }
    
                    }
                ]
            });
        });
</script>
 