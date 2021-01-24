<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
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
        if($data) {
            return view('home', compact('data'));
        } else {
            return redirect()->route('admin.forms.create');
        }
    }

}
