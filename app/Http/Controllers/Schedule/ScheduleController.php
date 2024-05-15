<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index');
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
 
        return view('schedule.index', compact('events'));
    }
}
