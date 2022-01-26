<?php

namespace App\Http\Controllers;

use App\Models\ExaminationPaper;
use App\Http\Requests\StoreExaminationPaperRequest;
use App\Http\Requests\UpdateExaminationPaperRequest;

class ExaminationPaperController extends Controller
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
     * @param  \App\Http\Requests\StoreExaminationPaperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminationPaperRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExaminationPaper  $examinationPaper
     * @return \Illuminate\Http\Response
     */
    public function show(ExaminationPaper $examinationPaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExaminationPaper  $examinationPaper
     * @return \Illuminate\Http\Response
     */
    public function edit(ExaminationPaper $examinationPaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExaminationPaperRequest  $request
     * @param  \App\Models\ExaminationPaper  $examinationPaper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExaminationPaperRequest $request, ExaminationPaper $examinationPaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExaminationPaper  $examinationPaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExaminationPaper $examinationPaper)
    {
        //
    }
}
