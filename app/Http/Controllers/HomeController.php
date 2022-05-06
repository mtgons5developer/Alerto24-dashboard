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
        $this->middleware(['auth', 'is_admin']);
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
        return redirect()->route('users.user.index');
//        return view('welcome', compact('users'));
    }

    public function change_email_verification_status(Request $request)
    {
        $status = $request->status == "true";
        $user = \App\Models\User::find($request->user_id);
        if ($status)
            $user->email_verified_at = today();
        else {
            $user->email_verified_at = null;
        }


        $user->save();

        return $user;
    }

    public function tasks()
    {
        $reference = $this->database->getReference('users');
        $users = $reference->getValue();
        // dd($snapshot);
        return view('welcome', compact('users'));
    }

    public function users()
    {
        $reference = $this->database->getReference('users/{}/details');
        $users = (object)$reference->getValue();
        return view('welcome', compact('users'));
    }

    public function municipality()
    {
        $reference = $this->database->getReference('users');
        $city_names = $this->database->getReference('address_lookup/cities')->getValue();
        $records = (object)$reference->getValue();
        $user_groups = [];
        $cityThatHaveUser = [];
//        dd($cityNames);

//        foreach ($cityNames as $cityName) {
//            $user_groups[] = ['city' => $cityName];
//        }

        foreach ($records as $record) {
            $details = $record['details'];
            $details['id'] = $record['id'];
            $user_groups[] = $details;
        }
//        dd($user_groups);
        $user_groups = collect($user_groups)
            ->groupBy('city')
            ->sortByDesc(function ($users, $key) {
                return count($users);
            });

        $cityThatHaveUser = array_keys($user_groups->toArray());
        foreach ($cityThatHaveUser as $cityName) {
            if (($key = array_search($cityName, $city_names)) !== false) {
                unset($city_names[$key]);
            }
        }
//        dd($city_names);

        return view('municipality', compact('user_groups', 'city_names'));
    }

}
