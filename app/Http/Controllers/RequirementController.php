<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Requirement;
use App\Http\Requests\RequirementRequest;
use App\Http\Controllers\Controller;

class RequirementController extends Controller
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
        $user = Auth::user();

        if($user->role == 0){
           return  redirect('/user_profile');
        }

        $requirements = Requirement::all();

        return view('requirements.show')->with(['requirements'=> $requirements ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requirements.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequirementRequest $request)
    {
        $requirement = new Requirement;

        $requirement->requirement = $request->get('requirement_name');

        $requirement->save();

        $request->session()->flash('msg', 'Requirement was successfully added!');

        return redirect('requirement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $requirement =  Requirement::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requirement =  Requirement::find($id);

        return view('requirements.update')->with(['requirement' => $requirement ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requirement = Requirement::find($id);

        $requirement->requirement = $request->get('requirement_name');

        $requirement->save();

        $request->session()->flash('msg', 'Requirement was successfully updated!');

        return redirect('requirement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Requirement::destroy($id);

        $request->session()->flash('msg', 'Requirement was successfully deleted!');

        return redirect('requirement');
    }
}
