<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\JobRequest;
use App\Job;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

class JobsController extends Controller
{

    public function _construct(){

    }

    public function index(){
        $jobs = Job::latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    public function showCreate(){
        return view('jobs.create');
    }

    public function saveJob(JobRequest $request){
        $job = new Job;
        $job->title = $request->input('title');
        $job->slug = Str::slug($request->input('title'));
        $job->auth_id = str_random(60) . $request->input('email') ;
        $job->description = $request->input('description');
        $job->user_email = $request->input('email');
        $raw_skills = str_replace(', ', ',', $request->input('skills'));
        $skills = explode(',', $raw_skills);
        $job->skills = json_encode($skills);
        $job->save();

        $this->sendEmail($job);
        return redirect('home')
            ->withSuccess('Your Job is Successfully posted. Please check your email to edit or delete the job link.');
    }

    public function showEdit($auth_id){
        $job = Job::where('auth_id', $auth_id)->first();
        if(!$job){
            return redirect()->route('home')->with('error', 'Sorry Please check your auth code! Or the job doesnot exists!!');
        }
        return view('jobs.edit', compact('job'));

    }

    public function updateJob(JobRequest $request){
        $job = Job::findorFail(\Crypt::decrypt($request->input('job_id')));
        $raw_skills = str_replace(' ', '', $request->input('skills'));
        $skills = explode(',', $raw_skills);
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->user_email = $request->input('email');
        $job->skills = json_encode($skills);
        $job->save();
        return redirect()->route('home')
            ->withSuccess('Your Job is Successfully Updated.');
    }

    public function deleteJob($auth_id){
        $job = Job::whereAuthId($auth_id);
        if(!$job){
            return redirect()->route('home')->with('error', 'Sorry Please check your auth code! Or the job doesnot exists!!');
        }
        $job->delete();
        return redirect()->route('home')->with('success', 'Job Successfully Deleteted!');
    }

    public function show($slug){

    }

    public function searchJobs(){
        $search = Input::get('q');
        $query = Job::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhere('skills','like', '%' . $search . '%');
            });
        }
        $jobs = $query->paginate(12);
        return view('jobs.searchresult', compact('jobs', 'search'));
    }


    public function sendEmail(Job $job)
    {
        $data = array(
            'title' => $job->title,
            'code' => $job->auth_id,
        ); 
        \Mail::queue('emails.jobPosted', $data, function ($message) use ($job) {
            $message->subject('Regarding Your Job Posted on Site');
            $message->to($job->user_email);
        });
    }
}
