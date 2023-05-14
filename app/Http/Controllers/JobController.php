<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $input = $request->validate([
            'title' => ['required', 'string', 'max:256'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'string', 'max:256'],
            'company' => ['required', 'string', 'max:256'],
            'location' => ['required', 'string', 'max:256'],
            'size' => ['required', 'string', 'max:256'],
            'industry' => ['required', 'string', 'max:256'],
            'sector' => ['required', 'string', 'max:256']
        ]);

        Job::query()->create([
            'job_title' => $request->input('title'),
            'job_description' => $request->input('description'),
            'salary_estimate' => $request->input('salary'),
            'company_name' => $request->input('company'),
            'location' => $request->input('location'),
            'size' => $request->input('size'),
            'industry' => $request->input('industry'),
            'sector' => $request->input('sector')
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
        $input = $request->validate([
            'title' => ['required', 'string', 'max:256'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'string', 'max:256'],
            'company' => ['required', 'string', 'max:256'],
            'location' => ['required', 'string', 'max:256'],
            'size' => ['required', 'string', 'max:256'],
            'industry' => ['required', 'string', 'max:256'],
            'sector' => ['required', 'string', 'max:256']
        ]);

        $job->update([
            'job_title' => $request->input('title'),
            'job_description' => $request->input('description'),
            'salary_estimate' => $request->input('salary'),
            'company_name' => $request->input('company'),
            'location' => $request->input('location'),
            'size' => $request->input('size'),
            'industry' => $request->input('industry'),
            'sector' => $request->input('sector')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
    }
    public function getLocations(){
        return job::query()->distinct()->get(['location']);
    }
    public function getIndustries(){
        return job::query()->where(['industry', '!=', -1])->distinct()->get(['industry']);
    }
}
