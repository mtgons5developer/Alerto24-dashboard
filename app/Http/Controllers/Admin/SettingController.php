<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function settings(){
        $settings = Setting::all();
        return view('admin.settings')
            ->With('settings',$settings);
    }
}
