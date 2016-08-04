<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Schedule;
use App\Type;
use App\Http\Requests\ScheduleRequest;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        $user = Auth::user();

        if($user->role == 0){
            abort(404);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();

        return view('schedule.index')->with(['schedules'=>$schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();

        return view('schedule.add')->with(['type'=> $type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        $schedule = new Schedule;
        $schedule->type_id = $request->get('type');
        $schedule->start_time = $request->get('start');
        $schedule->end_time = $request->get('end');
        $schedule->save();

        $request->session()->flash('msg', 'Schedule was successfully Added!');

        return redirect('schedule');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('schedule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $type = Type::all();

        return view('schedule.edit')->with(['schedule'=> $schedule,'type'=> $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, $id)
    {
        $schedule = Schedule::find($id);

        $schedule->type_id = $request->get('type');
        $schedule->start_time = $request->get('start');
        $schedule->end_time = $request->get('end');
        $schedule->save();

        $request->session()->flash('msg', 'Schedule was successfully Updated!');

        return redirect('schedule');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ScheduleRequest $request)
    {
        Schedule::destroy($id);

        $request->session()->flash('msg', 'Type was successfully Delete!');

        return redirect('schedule');

    }
}
