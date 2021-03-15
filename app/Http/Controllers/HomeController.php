<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Exam;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = Form::where('user_id',$user_id)->first();
        $exam = Exam::where('user_id',$user_id)->latest()->first();
        
        if($exam) {
            $data = $exam;
            return view('home', compact('data'));
        }
        if($data) {
            // dd($data->colleges()); 
            return view('home', compact('data'));
        }
    }

}
