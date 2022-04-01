<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $database;

    public function __construct()
    {
        $this->middleware(['auth','is_admin'] );
        // $this->middleware('is_admin');
        $this->database = app('firebase.database');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reference = $this->database->getReference('users');
        $users = $reference->getValue();
        // dd($snapshot);
        return view('welcome',compact('users'));
    }
    public function tasks(){
        $reference = $this->database->getReference('users');
        $users = $reference->getValue();
        // dd($snapshot);
        return view('welcome',compact('users'));
    }
}
