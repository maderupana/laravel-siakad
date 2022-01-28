<?php

namespace App\Http\Controllers;

use App\Models\UserTemp;
use App\Http\Requests\StoreUserTempRequest;
use App\Http\Requests\UpdateUserTempRequest;

class UserTempController extends Controller
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
     * @param  \App\Http\Requests\StoreUserTempRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTempRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTemp  $userTemp
     * @return \Illuminate\Http\Response
     */
    public function show(UserTemp $userTemp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTemp  $userTemp
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTemp $userTemp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserTempRequest  $request
     * @param  \App\Models\UserTemp  $userTemp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTempRequest $request, UserTemp $userTemp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTemp  $userTemp
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTemp $userTemp)
    {
        //
    }
}
