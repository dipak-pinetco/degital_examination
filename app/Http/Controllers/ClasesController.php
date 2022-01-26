<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Http\Requests\StoreClasesRequest;
use App\Http\Requests\UpdateClasesRequest;

class ClasesController extends Controller
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
     * @param  \App\Http\Requests\StoreClasesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClasesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function show(Clases $clases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function edit(Clases $clases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClasesRequest  $request
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClasesRequest $request, Clases $clases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clases  $clases
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clases $clases)
    {
        //
    }
}
