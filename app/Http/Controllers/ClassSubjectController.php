<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use App\Http\Requests\StoreClassSubjectRequest;
use App\Http\Requests\UpdateClassSubjectRequest;

class ClassSubjectController extends Controller
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
     * @param  \App\Http\Requests\StoreClassSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassSubjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function show(ClassSubject $classSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassSubject $classSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassSubjectRequest  $request
     * @param  \App\Models\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassSubjectRequest $request, ClassSubject $classSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassSubject  $classSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassSubject $classSubject)
    {
        //
    }
}
