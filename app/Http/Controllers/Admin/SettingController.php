<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderEntry;
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
    public function order_entry(){
        $data['order_entries'] = OrderEntry::all();
        $data['counter']       = 1;
        return view('admin.order_entries',$data);
    }
    public function change_order_entry_status(Request $request)
    {
        $status = $request->status == "true";
        $order_entry = \App\Models\OrderEntry::find($request->order_entry_id);

        if ($status)
            $order_entry->status = 1;
        else {
            $order_entry->status = 2;
        }

        $order_entry->save();
        return $order_entry;
    }
}
