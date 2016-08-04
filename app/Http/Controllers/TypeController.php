<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;
use App\Type;
use App\Requirement;
use App\Schedule;
use App\Http\Requests\TypeRequest;
use App\Http\Controllers\Controller;

class TypeController extends Controller
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
        $types = Type::all();

        return view('rtypes.index')->with(['types'=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $errors = $request->session()->get('errors');

        $requirements = Requirement::all();

        return view('rtypes.add')->with(['requirements'=>$requirements]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRequest $request)
    {
        $type = new Type;

        $type->type = $request->get('type');
        if($request->get('requirements')) $type->requirement_ids = implode(',',$request->get('requirements'));

        $type->participants = $request->get('is_single');
        $type->save();

        $request->session()->flash('msg', 'Type was successfully Added!');

        return redirect('type');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::find($id);
        if($type->requirement_ids) $requirement = DB::select("select * from requirements where id in ($type->requirement_ids) ");

        return view('rtypes.show')->with([
            'type'  => $type,
            'reqs'   => ($type->requirement_ids) ? $requirement: array()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        $requirements = Requirement::all();

        return view('rtypes.edit')->with([
            'type'          => $type,
            'reqs'          => explode(',',$type->requirement_ids),
            'requirements'  => $requirements
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRequest $request, $id)
    {
        $type = Type::find($id);

        $type->type = $request->get('type');
        if($request->get('requirements')) $type->requirement_ids = implode(',',$request->get('requirements'));

        $type->participants = $request->get('is_single');
        $type->save();

        $request->session()->flash('msg', 'Type was successfully updated!');

        return redirect('type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Type::destroy($id);
        Schedule::where('type_id',$id)->delete();

        $request->session()->flash('msg', 'Type was successfully Delete!');

        return redirect('type');
    }
}
