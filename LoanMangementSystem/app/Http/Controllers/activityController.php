<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class activityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activityLogs = Activity::all();

    return view('activity.index', compact('activityLogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
