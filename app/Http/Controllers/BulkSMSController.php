<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBulkSMSRequest;
use App\Http\Requests\UpdateBulkSMSRequest;
use App\Models\BulkSMS;

class BulkSMSController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Bulk SMS');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.bulk_sms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = null;

        return view('pages.bulk_sms.ces', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBulkSMSRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulkSMSRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BulkSMS  $bulkSMS
     * @return \Illuminate\Http\Response
     */
    public function show(BulkSMS $bulkSMS)
    {
        dd($bulkSMS);
        $data = $bulkSMS;

        return view('pages.bulk_sms.ces', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BulkSMS  $bulkSMS
     * @return \Illuminate\Http\Response
     */
    public function edit(BulkSMS $bulkSMS)
    {
        $data = $bulkSMS;

        return view('pages.bulk_sms.ces', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBulkSMSRequest  $request
     * @param  \App\Models\BulkSMS  $bulkSMS
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBulkSMSRequest $request, BulkSMS $bulkSMS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BulkSMS  $bulkSMS
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulkSMS $bulkSMS)
    {
        //
    }
}
