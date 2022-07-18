<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorWorkRequest;
use App\Http\Requests\UpdateDoctorWorkRequest;
use App\Models\DoctorWork;

class DoctorWorkController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorWorkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorWork  $doctorWork
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorWork $doctorWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorWork  $doctorWork
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorWork $doctorWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorWorkRequest  $request
     * @param  \App\Models\DoctorWork  $doctorWork
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorWorkRequest $request, DoctorWork $doctorWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorWork  $doctorWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorWork $doctorWork)
    {
        //
    }
}
