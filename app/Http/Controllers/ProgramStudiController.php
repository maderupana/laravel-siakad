<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use App\Http\Requests\StoreProgramStudiRequest;
use App\Http\Requests\UpdateProgramStudiRequest;

class ProgramStudiController extends Controller
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
     * @param  \App\Http\Requests\StoreProgramStudiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramStudiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProgramStudiRequest  $request
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramStudiRequest $request, ProgramStudi $programStudi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramStudi  $programStudi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudi $programStudi)
    {
        //
    }
}
