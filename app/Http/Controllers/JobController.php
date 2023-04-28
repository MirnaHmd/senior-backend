<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return response()->json([
            'success' => [
                'jobs' => $jobs
            ],
            'message' => 'Jobs Fetched Successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Job::query()->create([
            ''
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return response()->json([
            'success' => [
                'job' => $job
            ],
            'message' => 'Job Fetched Successfully'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        Job::query()->update([

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
