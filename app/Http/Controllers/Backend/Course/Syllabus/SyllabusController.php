<?php

namespace App\Http\Controllers\Backend\Course\Syllabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course\Syllabus\CourseSyllabus;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $syllabi = CourseSyllabus::all();
        return response()-> json([
            'syllabi' => $syllabi,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $syllabus = CourseSyllabus::with(
            'practice',
            'course'
        )->find($id);
        return response()-> json([
            'syllabus'=>$syllabus,
        ], 200);


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
        $syllabus = CourseSyllabus::find($id);
        $syllabus->requirement       = $request->requirement;
        $syllabus->practice_id       = $request->practice_id;
        $syllabus->lessons           = $request->lessons;
        $syllabus->hours             = $request->hours;
        $syllabus->what_to_learn     = $request->what_to_learn;
        $syllabus->what_to_achieve   = $request->what_to_achieve;
        $syllabus->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
