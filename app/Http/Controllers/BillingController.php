<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBillingRequest;
use App\Http\Requests\UpdateBillingRequest;
use App\Models\Billing;

class BillingController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Billing');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.billing.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;

        return view('pages.billing.ces', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function show(Billing $billing)
    {
        $data = $billing;

        return view('pages.billing.ces', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function edit(Billing $billing)
    {
        $data = $billing;

        return view('pages.billing.ces', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillingRequest  $request
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillingRequest $request, Billing $billing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Billing  $billing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Billing $billing)
    {
        //
    }
}
