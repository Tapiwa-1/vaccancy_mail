<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ResumeController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('User/Resume/Index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
        return Inertia::render('User/Resume/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'jobTitle' => 'required',
            'resumeDetails' => 'required',
        ]);
        Resume::create([
            'jobTitle'=> $request->jobTitle,
            'resumeDetails' => $request->resumeDetails,
            'user_id'=>Auth()->id(),
        ]);
        return to_route('user.resume.index')->with('message','resume added successfully');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Job  $job
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($slug)
    // {
    //     $job = Job::where('slug', $slug)->first();
    //     return Inertia::render("Employer/Jobs/Show", compact('job'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Job  $job
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Job $job)
    // {
    //     //

    //     return Inertia::render('Employer/Jobs/Edit',compact('job'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Job  $job
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Job $job)
    // {
    //        $validated = $request->validate([
    //         'jobTitle' => 'required',
    //         'jobDescription' =>'required',
    //         'dueDate'=>'required',
    //         'jobSummary'=>'required'
    //         ]);
    //     // dd($validated);
    //     $job->update([
    //         'jobTitle' => $request->jobTitle,
    //         'jobDescription'=> $request->jobDescription,
    //         'dueDate'=> $request->dueDate,
    //         'jobSummary'=> $request->jobSummary,
    //         'user_id'=>Auth()->id()
    //     ]);
    //     return to_route('employer.jobs.index')->with('message','job edited successfully');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Job  $job
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Job $job)
    // {
    //     $job->delete();
    //     return to_route('employer.jobs.index')->with('message','job deleted successfully');
    // }
}
