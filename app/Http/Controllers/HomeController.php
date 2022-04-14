<?php

namespace App\Http\Controllers;

use App\Models\Setting;
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

    public function users(){
        $reference = $this->database->getReference('users/{}/details');
        $users = (object)$reference->getValue();
        dd($users);
        return view('welcome',compact('users'));
    }
    public function municipality(){
        $reference = $this->database->getReference('users');
        $records = (object)$reference->getValue();
        $user_groups = [];
        foreach($records as $record){
            $details = $record['details'];
            $details['id'] = $record['id'];
            $user_groups[] = $details;
        }
        $user_groups = collect($user_groups)
        ->groupBy('city')
        ->sortByDesc(function ($users, $key) {
            return count($users);
       });
        // $user =  $users->groupBy('province');
        // dd($user_groups);
        return view('municipality',compact('user_groups'));
    }

}
