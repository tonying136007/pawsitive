@extends('layouts.app')


@section('content')
<button type="button" class="bg-gray-500 hover:bg-gray-700 text-sm text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="window.location.href='{{ route('schedules.viewtable') }}'">View Schedule Table</button>

    
@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endpush
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">


<div id="calendar"></div>

</div>



</div>

    @push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    @endpush
    
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script> 
            document.addEventListener('DOMContentLoaded', function () {
    
                var calendarEl = document.getElementById('calendar');
                
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '8:00:00',
                    slotMaxTime: '19:00:00',
                    events: @json($events),
                    eventContent: function(arg) {
                        var event = arg.event;
                        if (event.extendedProps && event.extendedProps.comments) {
                            return { html: `<div><b>${event.start}</b><b>${event.end}</b><br>${event.extendedProps.comments}</div>` };
                        } else {
                            return { html: `<div><b>${event.title}</b></div>` };
                        }
                    }
                });
                calendar.render();
            });


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
    @endpush
@endsection







