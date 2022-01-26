<?php

namespace App\Http\Controllers;

use App\Models\ExaminationGroup;
use App\Http\Requests\StoreExaminationGroupRequest;
use App\Http\Requests\UpdateExaminationGroupRequest;

class ExaminationGroupController extends Controller
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
     * @param  \App\Http\Requests\StoreExaminationGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationGroupRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExaminationGroup  $examinationGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ExaminationGroup $examinationGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExaminationGroup  $examinationGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ExaminationGroup $examinationGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExaminationGroupRequest  $request
     * @param  \App\Models\ExaminationGroup  $examinationGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExaminationGroupRequest $request, ExaminationGroup $examinationGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExaminationGroup  $examinationGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExaminationGroup $examinationGroup)
    {
        //
    }
}
