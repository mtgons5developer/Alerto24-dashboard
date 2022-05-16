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
    public function add_pair(Request $request){
        $this->validate($request,[
            'pair'      => 'required',
            'timeframe' => 'required'
        ]);
            $setting = Setting::create([

                'pair'           => $request->pair,
                'qty'            => 0.001,
                'vol'            => 1,
                'deltaSMA'       => 24,
                'deltaRSI'       => 24,
                'rsiLong'        => 1,
                'rsiShort'       => 80,                
                'timeframe'      => $request->timeframe,
                'toggle'         => 2,
                'Error'          => 0,
                // 'datetime'  => now(),

            ]);

        return redirect()->back()
            ->with('success_message', 'Setting Pair was successfully added.');
    }
    public function settings_delete($id){
        $setting = Setting::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success_message','Setting Pair was removed Successfully');
    }
    public function trade_history(){
        $trade_histories = TradeHistory::all();
        return view('admin.trade_history')
            ->with('trade_histories',$trade_histories);
    }
    public function add_qty(Request $request){
        $setting = Setting::where('id',$request->setting_id)->first();

        if($request->quantity){
            $setting->qty         = $request->quantity;
        }

        $setting->save();
        return $setting;
    }
    public function add_deltaSMA(Request $request){
        $setting = Setting::where('id',$request->setting_deltaSMA)->first();

        if($request->deltatimeSMA){
            $setting->deltaSMA         = $request->deltatimeSMA;
        }

        $setting->save();
        return $setting;
    }
    

    public function add_volume(Request $request){
        $setting = Setting::where('id',$request->setting_volume)->first();

        if($request->volume){
            $setting->vol         = $request->volume;
        }
        $setting->save();
        return $setting;
    }
    
    public function order_entry() {
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
    public function change_setting_toggle(Request $request){
        $toggle  = $request->status  == "true";
        $setting = Setting::find($request->seeting_id);

        if ($toggle) {
            $setting->toggle = 1;
            $setting->Error  = 0;
        } else {
            $setting->toggle = 2;
            $setting->Error  = 0;
        }

        $setting->save();
        return $setting;
    }
    public function change_setting_orderType(Request $request){
        $toggle  = $request->status  == "true";
        $setting = Setting::find($request->seeting_orderType);

        if ($toggle) {
            $setting->order_type = "MARKET";
        } else {
            $setting->order_type = "TEST";
        }

        $setting->save();
        return $setting;
    }    
    

}
