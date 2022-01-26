<?php

namespace App\Http\Controllers;

use App\Models\ExaminationPaperQuestion;
use App\Http\Requests\StoreExaminationPaperQuestionRequest;
use App\Http\Requests\UpdateExaminationPaperQuestionRequest;

class ExaminationPaperQuestionController extends Controller
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
     * @param  \App\Http\Requests\StoreExaminationPaperQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationPaperQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExaminationPaperQuestion  $examinationPaperQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(ExaminationPaperQuestion $examinationPaperQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExaminationPaperQuestion  $examinationPaperQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(ExaminationPaperQuestion $examinationPaperQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExaminationPaperQuestionRequest  $request
     * @param  \App\Models\ExaminationPaperQuestion  $examinationPaperQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExaminationPaperQuestionRequest $request, ExaminationPaperQuestion $examinationPaperQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExaminationPaperQuestion  $examinationPaperQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExaminationPaperQuestion $examinationPaperQuestion)
    {
        //
    }
}
