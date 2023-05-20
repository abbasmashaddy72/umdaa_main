<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRelationRequest;
use App\Http\Requests\UpdatePatientRelationRequest;
use App\Models\PatientRelation;

class PatientRelationController extends Controller
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
     * @param  \App\Http\Requests\StorePatientRelationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRelationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientRelation  $patientRelation
     * @return \Illuminate\Http\Response
     */
    public function show(PatientRelation $patientRelation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatientRelation  $patientRelation
     * @return \Illuminate\Http\Response
     */
    public function edit(PatientRelation $patientRelation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePatientRelationRequest  $request
     * @param  \App\Models\PatientRelation  $patientRelation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePatientRelationRequest $request, PatientRelation $patientRelation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientRelation  $patientRelation
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientRelation $patientRelation)
    {
        //
    }
}
