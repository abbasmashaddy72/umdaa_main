<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorEducationRequest;
use App\Http\Requests\UpdateDoctorEducationRequest;
use App\Models\DoctorEducation;

class DoctorEducationController extends Controller
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
     * @param  \App\Http\Requests\StoreDoctorEducationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorEducationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DoctorEducation  $doctorEducation
     * @return \Illuminate\Http\Response
     */
    public function show(DoctorEducation $doctorEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorEducation  $doctorEducation
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorEducation $doctorEducation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorEducationRequest  $request
     * @param  \App\Models\DoctorEducation  $doctorEducation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorEducationRequest $request, DoctorEducation $doctorEducation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorEducation  $doctorEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorEducation $doctorEducation)
    {
        //
    }
}
