<?php

namespace App\Http\Controllers\Scheduling;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('scheduling/index');
    }
}
