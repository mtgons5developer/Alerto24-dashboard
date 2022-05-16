<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomRegistrationController extends Controller
{
    public function bnbRegistration(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'     =>'required',
            'password'  =>'required',
        ]);

            $user = User::create([
                'name'          => $request->name,
                'is_admin'      => "2",
                'device_token'  => "web",
                'email'         => $request->email,
                'password'      => Hash::make($request['password']),
               ]);
            if(Auth::attempt(['email'=> $request->email,'password'=>$request->password])) {
                $user = Auth::user()->where('email','=',$request->email)->first();
                return redirect('admin/settings');
            }


    }
}
