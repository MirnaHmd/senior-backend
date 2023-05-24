<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;
use phpseclib3\Math\BigInteger\Engines\PHP\Reductions\Barrett;

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
        $request->validate([
            'job_title' => ['required', 'string', 'max:256'],
            'job_description' => ['required', 'string'],
            'company_name' => ['required', 'string', 'max:256'],
            'location' => ['required', 'string', 'max:256'],
            'industry' => ['required', 'string', 'max:256'],
        ]);

        /**
         * @var Job $job
         */
        $job = Job::query()->create([
            'job_title' => $request->input('job_title'),
            'user_id' => auth()->user()->id,
            'job_description' => $request->input('job_description'),
            'company_name' => $request->input('company_name'),
            'location' => $request->input('location'),
            'industry' => $request->input('industry'),
        ]);

        return response()->json([
            'success' => [
                'job' => ['Created']
            ],
            'message' => 'Job Created Successfully'
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
        try {
            $request->validate([
                'title' => ['string', 'max:256'],
                'description' => ['string'],
                'company' => ['string', 'max:256'],
                'location' => ['string', 'max:256'],
                'industry' => ['string', 'max:256'],
            ]);
        } catch (ValidationException $exception) {
            return response()->json([
                'error' => [
                    $exception->errors()
                ],
                'message' => $exception->getMessage()
            ]);
        }
        $job->update([
            'job_title' => $request->input('job_title'),
            'job_description' => $request->input('job_description'),
            'company_name' => $request->input('company_name'),
            'location' => $request->input('location'),
            'industry' => $request->input('industry'),
        ]);
        return response()->json([
            'success' => [
                'job' => ['Updated']
            ],
            'message' => 'Job updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->users()->detach();
        $job->delete();
    }

    public function getLocations()
    {
        return job::query()->distinct()->pluck('location')->toArray();
    }

    public function getIndustries()
    {
        return job::query()->where([['industry', '!=', -1]])->distinct()->pluck('industry')->toArray();
    }

    public function getUserJobs()
    {
        return \auth()->user()->jobs;
    }
    public function getAppliedJobs(){
        return \auth()->user()->appliedJobs;
    }
}
