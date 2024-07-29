<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollment = Enrollment::get();
        return view('backend.enrollment.index', compact('enrollment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $enrole=new Enrollment;
        $enrole->student_id=$request->student_id;
        $enrole->course_id=$request->course_id;
        $enrole->enrollment_date=date('Y-m-d');
        $enrole->save();
        return redirect()->route('studentdashboard')->with('success', 'you have successfully added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function destroy($id)
    {
        $data = Enrollment::findOrFail(encryptor('decrypt', $id));
        if ($data->delete()) {
            $this->notice::error('Enlorment Data has Deleted!');
            return redirect()->back();
        }
    }
}
