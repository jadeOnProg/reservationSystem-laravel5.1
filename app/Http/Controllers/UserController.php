<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Hash;
use Redirect;
use App\User;
use App\Reservation;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{

    public function __construct(){

        $this->middleware('auth',['except'=>'store']);
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

        $users = User::where('role',0)->get();

        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $errors = $request->session()->get('errors');

        return view('users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostRequest $request)
    {
        $user = new User;

        $user->email      = $request->get('email');
        $user->password   = bcrypt($request->get('password'));
        $user->contact    = $request->get('contact');
        $user->firstname  = ucfirst($request->get('firstname'));
        $user->middlename = ucfirst($request->get('middlename'));
        $user->lastname   = ucfirst($request->get('lastname'));
        $user->address    = ucfirst($request->get('address'));

        $user->save();

        $request->session()->flash('msg', 'User was successfully added!');

        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $reservations = $user->reservation;

        return view('users.show')->with(['user'=> $user,'reservations'=> $reservations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.update')->with(['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPostRequest $request, $id)
    {
        $user = User::find($id);

        $user->email      = $request->get('email');
        $user->password   = (Hash::needsRehash($request->get('password')))? bcrypt($request->get('password')):$request->get('password');
        $user->contact    = $request->get('contact');
        $user->firstname  = ucfirst($request->get('firstname'));
        $user->middlename = ucfirst($request->get('middlename'));
        $user->lastname   = ucfirst($request->get('lastname'));
        $user->address    = ucfirst($request->get('address'));

        $user->save();

        $request->session()->flash('msg', 'User was successfully updated!');

         if($user->role == 0){
           return  redirect('/user_profile');
        }


        return redirect('user');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User::destroy($id);
        Reservation::where('user_id',$id)->delete();

        $request->session()->flash('msg', 'User was successfully deleted!');

        return redirect('user');
    }
}
