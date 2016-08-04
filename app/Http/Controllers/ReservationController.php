<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Reservation;
use App\Type;

use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->role == 0){
           return  redirect('/user_profile');
        }

        $reservations = Reservation::all();

        return view('reservations.index')->with(['reservations'=> $reservations ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('reservation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        $reservation = new Reservation;

        $reservation->user_id   = $request->get('user_id');
        $reservation->type_id   = $request->get('type');
        $reservation->schedule_id = $request->get('schedule');

        $reservation->save();

        $request->session()->flash('msg', 'Reservation was successfully saved!');

        if(Auth::user()->role == 0){
           return  redirect('/user_profile');
        }

        return redirect('reservation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('reservation');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        $types = Type::all();

        return view('reservations.edit')->with(['reservation'=> $reservation,'types'=> $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, $id)
    {
        $reservation = Reservation::find($id);

        $reservation->user_id   = $request->get('user_id');
        $reservation->type_id   = $request->get('type');
        $reservation->schedule_id = $request->get('schedule');

        $reservation->save();

        $request->session()->flash('msg', 'Reservation was successfully updated!');

        if(Auth::user()->role == 0){
           return  redirect('/user_profile');
        }

        return redirect('reservation');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Reservation::destroy($id);

        $request->session()->flash('msg', 'Reservation was successfully deleted!');

        if(Auth::user()->role == 0){
           return  redirect('/user_profile');
        }

        return redirect('reservation');
    }
}
