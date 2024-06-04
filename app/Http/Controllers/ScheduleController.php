<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedules.index');
    }

    public function viewSchedTable()
    {
        return view('schedules.viewtable');
    }

    public function scheduleTable(Request $request){
        if ($request->ajax()) {
            $schedules = Schedule::select('id', 'user_id', 'start_time', 'finish_time', 'comments', 'type', 'doctor', 'diagnosis_id', 'pet_id', 'created_at');

            $editUrls = [];
            $schedules->each(function ($schedule) use (&$editUrls) {
                $editUrls[$schedule->id] = route('schedules.edit', $schedule->id);
            });

            return DataTables::of($schedules)
                ->addColumn('action', function ($schedule) use ($editUrls) {
                    $editUrl = $editUrls[$schedule->id];
                    $deleteUrl = route('schedules.destroy', $schedule->id);

                    return '<a href="'. $editUrl. '" class="btn btn-primary">Edit</a>
                            <form method="POST" action="'. $deleteUrl. '" style="display:inline;">
                                @csrf 
                                @method("DELETE") 
                                <button type="submit" class="btn btn-danger">Delete</button> 
                            </form>';
                })
                ->make(true);
        }

        return view('schedules.index');

    }
    
    public function __invoke()
    {
        $events = [];
 
        $appointments = Schedule::with(['User'])->get();
 
        foreach ($appointments as $appointment) {
            $events[] = [
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
                'comments' => $appointment->comments,
            ];
        }
 
        return view('schedules.index', compact('events'));
    }
}
