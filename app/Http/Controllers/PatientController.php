<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::all();

        return view('patients.index',[
            'patients'  => $patient,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Patient::create([
            'name'  =>$request->name,
            'email'  =>$request->email,
            'cell'  =>$request->cell,
            'username'  =>$request->uname,
            'photo'  =>$request->photo,
        ]);
        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return view('patients.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $edit_data = Patient::all($id);
       return view('patients.edit',compact(edit_data));
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
       $update_data = Patient::find($id);
       $update_data ->name = $request->name;
       $update_data ->email = $request->email;
       $update_data ->cell = $request->cell;
       $update_data ->uname = $request->username;
       $update_data ->photo = $request->photo;

       $update_data ->update();
       return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete_data = Patient::find($id);
       $delete_data ->delete();
       return redirect()->route('patients.index');
    }
}
