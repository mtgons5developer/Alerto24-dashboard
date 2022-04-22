<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\TradeHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function settings(){
        $settings = Setting::all();
        return view('admin.settings')
            ->With('settings',$settings);
    }
    public function trade_history(){
        $trade_histories = TradeHistory::all();
        return view('admin.trade_history')
            ->with('trade_histories',$trade_histories);
    }
    public function add_qty(Request $request ,$id){

       $this->validate($request,[
           'qty'      => 'required',
           'datetime' => 'required'
       ]);
       if ($request->toggle == 'on') {
           $toggle = 1;
       } else {
           $toggle = 0;
       }
       Setting::where('id',$id)->update([
            'qty'       => $request->qty,
            'toggle'    => $toggle,
            'datetime'  => $request->datetime
       ]);
       return redirect()->back();
    }
}
