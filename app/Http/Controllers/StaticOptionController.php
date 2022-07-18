<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaticOptionRequest;
use App\Http\Requests\UpdateStaticOptionRequest;
use App\Models\StaticOption;

class StaticOptionController extends Controller
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
     * @param  \App\Http\Requests\StoreStaticOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaticOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaticOption  $staticOption
     * @return \Illuminate\Http\Response
     */
    public function show(StaticOption $staticOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaticOption  $staticOption
     * @return \Illuminate\Http\Response
     */
    public function edit(StaticOption $staticOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaticOptionRequest  $request
     * @param  \App\Models\StaticOption  $staticOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaticOptionRequest $request, StaticOption $staticOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaticOption  $staticOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaticOption $staticOption)
    {
        //
    }
}
