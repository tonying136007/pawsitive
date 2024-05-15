@extends('layouts.app')

@section('content')
@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
@endpush
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">


<div id="calendar"></div>

</div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
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
        </script>
    @endpush
@endsection







