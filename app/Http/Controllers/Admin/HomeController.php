<?php

namespace App\Http\Controllers\Admin;
use App\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('deadline','asc')->get();
        foreach ($subjects as $subject) {
            $startTime = Carbon::now();
            $endTime = Carbon::parse($subject->deadline);
            $totalHoursLeft = $endTime->diffInHours($startTime);
            $totalSecondsLeft = $endTime->diffInSeconds($startTime);
            $timeRemaining = $endTime->diffForHumans($startTime);

            if ($subject->deadline != NULL){
            $subject->timeRemaining = str_replace_first('after','left',$timeRemaining);
            }
            if($totalHoursLeft>48 || $subject->deadline == NULL){
            $subject->status = 'info';
            }elseif($totalHoursLeft>24){
                $subject->status = 'warning';
            }else{
                $subject->status = 'danger';
            }if(str_contains($timeRemaining,'before')){
                $subject->status = 'expired';
            }
        }
        return view('admin.backend.index',compact('subjects'));
    }
}
