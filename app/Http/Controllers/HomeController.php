<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$data['students'] = Students::where('user_id',auth::user()->id)->first();
        //return $data['students'];
        return view('show');

    }

    

    
}
