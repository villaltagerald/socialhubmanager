<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QueuingSchedule;
use Carbon\Carbon;

class QueuingScheduleController extends Controller
{

    public function create()
    {   
        $queuing_schedule= QueuingSchedule::all();

        return view('components.queuingschedule', [
            'queuing_schedule' => $queuing_schedule
        ]);
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required|max: 255',
        ]);
        $date = $request->input('date');
        $hour = $request->input('hour');
        
        $attributes['publish_at'] = Carbon::parse($date. ' ' . $hour);;

        $user = QueuingSchedule::create($attributes);

        return redirect()->back()->with('success', 'Your account has been created.');
    }
    public function destroy(QueuingSchedule $queuingschedule)
    {
        $queuingschedule->delete();
        return back()->with('success', 'Queuing schedule Deleted!');
    }
}
