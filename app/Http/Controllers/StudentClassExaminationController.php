<?php

namespace App\Http\Controllers;

use App\Models\StudentClassExamination;
use App\Http\Requests\StoreStudentClassExaminationRequest;
use App\Http\Requests\UpdateStudentClassExaminationRequest;

class StudentClassExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreStudentClassExaminationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentClassExaminationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClassExamination  $studentClassExamination
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClassExamination $studentClassExamination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClassExamination  $studentClassExamination
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClassExamination $studentClassExamination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentClassExaminationRequest  $request
     * @param  \App\Models\StudentClassExamination  $studentClassExamination
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentClassExaminationRequest $request, StudentClassExamination $studentClassExamination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClassExamination  $studentClassExamination
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClassExamination $studentClassExamination)
    {
        //
    }
}
