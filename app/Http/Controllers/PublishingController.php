<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublishingController extends Controller
{
    public function instant()
    {
        return view('components.instant');
    }
    public function queued()
    {
        return view('components.queued');
    }
    public function scheduled()
    {
        return view('components.scheduled');
    }
    public function queuedscheduled()
    {
        return view('components.queuedschedule');
    }
}
