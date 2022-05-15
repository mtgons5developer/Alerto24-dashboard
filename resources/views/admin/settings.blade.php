@extends('admin_layouts.base')

@section('content')
    <style>
  
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(2px);
            -ms-transform: translateX(2px);
            transform: translateX(2px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>


        <!--@if(Session::has('success_message'))-->
        <!--    <div class="alert alert-success">-->
        <!--        <i class=" fas fa-fw fa-check" aria-hidden="true"></i>-->
        <!--        {!! session('success_message') !!}-->

        <!--        <button type="button" class="close" data-dismiss="alert" aria-label="close">-->
        <!--            <span aria-hidden="true">&times;</span>-->
        <!--        </button>-->

        <!--    </div>-->
        <!--@endif-->
        <div class="card">
            <h1 style=" margin-top: 15px; margin-left: 20px;" data-toggle="tooltip" data-html="true" title="<em><u>Tooltip</u></em>"> Settings (Advance)</h1>
            <div class="card-body">
                <div class="row">
                    <form method="post" action="{{route('admin.add_pair')}}">
                        @csrf
                        <div class="d-flex">

                                <select class="form-control mr-2" name="pair" placeholder="Add Pair">
                                	<option value="">--- Select your Pair ---</option>
                                	<option value="BTCUSDT">BTCUSDT</option>
                                	<option value="ETHUSDT">ETHUSDT</option>
                                	<option value="BNBUSDT">BNBUSDT</option>
                                	<option value="XRPUSDT">XRPUSDT</option>
                                	<option value="SOLUSDT">SOLUSDT</option>
                                	<option value="LUNAUSDT">LUNAUSDT</option>
                                	<option value="ADAUSDT">ADAUSDT</option>
                                	<option value="USTUSDT">USTUSDT</option>
                                	<option value="BUSDUSDT">BUSDUSDT</option>
                                	<option value="DOGEUSDT">DOGEUSDT</option>
                                	<option value="AVAXUSDT">AVAXUSDT</option>
                                	<option value="DOTUSDT">DOTUSDT</option>
                                	<option value="SHIBUSDT">SHIBUSDT</option>
                                	<option value="WBTCUSDT">WBTCUSDT</option>
                                	<option value="DAIUSDT">DAIUSDT</option>
                                	<option value="MATICUSDT">MATICUSDT</option>

                                </select>

                                <select class="form-control mr-2" name="timeframe" placeholder="Time Frame" style="margin-left: 10px;">
                                	<option value="">--- Select Time Frame ---</option>
                                	<option value="3m">3 minutes</option>
                                	<option value="5m">5 minutes</option>
                                	<option value="15m">15 minutes</option>
                                	<option value="30m">30 minutes</option>
                                	<option value="1h">1 hour</option>
                                	<option value="2h">2 hours</option>
                                	<option value="4h">4 hours</option>
                                	<option value="6h">6 hours</option>
                                	<option value="8h">8 hours</option>
                                	<option value="12h">12 hours</option>
                                	<option value="1d">1 day</option>

                                </select>

                                <button type="submit" class="btn btn-success" style="margin-left: 10px;">+ADD</button>
                                
                        </div>
                    </form>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="kt_datatable">
                        {{--                        <table style="overflow: hidden;"  class="table table-head-custom table-vertical-center table-head-bg table-borderless">--}}
                        <thead>
                        <tr class="text-left">
                            <th >
                                <span class="text-dark-75">Pair</span>
                            </th>
                            <th data-toggle="tooltip" data-html="true" title="<em>The amount of trade for the entry.</em>"><u>QTY</u></th>
                            <!--<th data-toggle="tooltip" data-html="true" title="<em>This will trigger if Volume is set to a certain amount. Example: If you set Volume to 500, soon as the Volume trade >= 500 this will be triggered.<br><br><b>Hence:</b> Volume is different for each Pair so choose wisely.</em>"><u>VOL</u></th>-->
                            <!--<th data-toggle="tooltip" data-html="true" title="<em>This will trigger RSI for LONG position. Example: If RSI is set to 80 soon as the indicator detected >= 80 this will be triggered.</em>"><u>RSI Long</u></th>-->
                            
                            <!--<th data-toggle="tooltip" data-html="true" title="<em>This will trigger RSI for SHORT position. Example: If RSI is set to 80 soon as the indicator detected >= 80 this will be triggered.</em>"><u>RSI Short</u></th>-->
                            
                            <th data-toggle="tooltip" data-html="true" title="<em>-DEFAULT-<br> 1 Day DF=1000<br> 12 Hours DF=500 <br> 8 Hours=300 <br> 6 Hours=200<br> 4 Hours=140<br>2 Hours=80<br> 1 Hour=40<br> 30 Minutes=24<br> 15 Minutes=16<br>5 Minutes=12<br>3 Minutes=10 </em>"><u>Delta Time</u></th>
                            
                            <th data-toggle="tooltip" data-html="true" title="<em>This column will show if you have Error on your Delta Time column.</em>"><u>Error</u></th>
                            
                            <th class="text-center" data-toggle="tooltip" data-html="true" title="<em>Order Type of Entry.<br><br><b>Market Order</b> will create your position on realtime based on selected time frame.<br><br><b>Test Order</b> will only record to your Order Entry page and show Win/Lose entries.</em>"><u>Order Type</u></th>
                            
                            <th class="text-center" data-toggle="tooltip" data-html="true" title="<em>This will Enable or Disable trading for a specific Pair.<br><br>Red button will remove a specific pair of choice.</em><br><br>Hence: Remove duplicate pair to prevent multiple entries from the same pair.<br>OR<br><b>Activate only a single Pair."><u>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($settings as $setting)

                            <tr>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->pair }} {{ $setting->timeframe }}</span>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input  setting_id="{{ $setting->id }}" name="qty" class="quantity form-control form-control-sm" value="{{ $setting->qty }}" size="1"></span>
                                    </td>
                                    
                                    <!--<td>-->
                                    <!--    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_volume="{{ $setting->id }}" name="vol" class="volume form-control form-control-sm" value="{{ $setting->vol }}" size="1"></span>-->
                                    <!--</td>-->

                                    <input type="hidden" name="setting_volume" class="setting_volume" value="{{ $setting->id }}">

                                    <!--<td>-->
                                    <!--    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_rsiLong="{{ $setting->id }}" name="rsiLong" class="drsiLong form-control form-control-sm" value="{{ $setting->rsiLong }}" size="1"></span>-->
                                    <!--</td>-->
                                        
                                    <!--<td>-->
                                    <!--    <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_rsiShort="{{ $setting->id }}" name="rsiShort" class="drsiShort form-control form-control-sm" value="{{ $setting->rsiShort }}" size="1"></span>-->
                                    <!--</td>-->
                                    
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_deltaSMA="{{ $setting->id }}" name="deltaSMA" class="deltatimeSMA form-control form-control-sm" value="{{ $setting->deltaSMA }}" size="1"></span>
                                    </td>
                                    
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg error_log">{{ $setting->Error }}</span>
                                    </td>
                                    
                                    <td class="pr-0" >
                                        <input
                                            id="checkbox{{$setting->id}}"
                                            class="bootstrap_switch" type="checkbox"
                                            seeting_orderType="{{ $setting->id }}"
                                            name="switch_{{$setting->id}}" {{ $setting->order_type != "TEST"?'checked':'' }}
                                            data-on-text="MARKET" data-handle-width="60" data-off-text="TEST"
                                            data-on-color="primary"
                                        >

                                    </td>
                                    
                                    <td class="pr-0" >
                                        <input
                                            id="checkbox{{$setting->id}}"
                                            class="bootstrap_switch" type="checkbox"
                                            seeting_id="{{ $setting->id }}"
                                            name="switch_{{$setting->id}}" {{ $setting->toggle != 2?'checked':'' }}
                                            data-on-text="ON" data-handle-width="30" data-off-text="OFF"
                                            data-on-color="primary"
                                        >
                                        <a href="{{route('admin.settings_delete',['id'=>$setting->id])}}"
                                           onclick="return confirm(&quot;<b>Click Ok to remove Pair.&quot;)"
                                           class="btn btn-danger" style="margin-left: 10px;"
                                        >-</a>
                                    </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>

        @endsection

        @section('scripts')
            <script type="text/javascript">

                // var datatable = $('#kt_datatable').DataTable(
                //     {
                //         "paging":   false,
                //     }
                // );
                $('#checkbox16').change(function () {
                    alert($(this).attr('order_entry_id'))
                });

                var KTBootstrapSwitch = function () {

                    // Private functions
                    var demos = function () {
                        // minimum setup
                        $('.bootstrap_switch').bootstrapSwitch({
                            onSwitchChange: function (event, state) 
                            {
                                let seeting_orderType = $(event.target).attr('seeting_orderType');
                                $.get("{{ route('change_setting_orderType') }}", {seeting_orderType: seeting_orderType, status: state});

                                let seeting_id = $(event.target).attr('seeting_id');
                                $.get("{{ route('change_setting_toggle') }}", {seeting_id: seeting_id, status: state});
                                
                                if(state == true){
                                    var parent = $(this).parent().parent().parent().parent();
                                    parent.find('.error_log').text("0");
                                }

                            }
                        });
                    };

                    $("body").on('keyup','.quantity',function (){

                        var setting_id = $(this).attr('setting_id');
                        var quantity   = $(this).val();
                        // console.log(quantity);
                        $.get("{{ route('admin.add.qty') }}", {setting_id: setting_id, quantity: quantity});
                    });

                    $("body").on('keyup','.drsiLong',function (){

                        var setting_rsiLong = $(this).attr('setting_rsiLong');
                        var drsiLong   = $(this).val();
                        // console.log(drsiLong);
                        $.get("{{ route('admin.add.rsiLong') }}", {setting_rsiLong: setting_rsiLong, drsiLong: drsiLong});
                    });

                    $("body").on('keyup','.drsiShort',function (){

                        var setting_rsiShort = $(this).attr('setting_rsiShort');
                        var drsiShort   = $(this).val();
                        // console.log(drsiShort);
                        $.get("{{ route('admin.add.rsiShort') }}", {setting_rsiShort: setting_rsiShort, drsiShort: drsiShort});
                    });
                    
                    $("body").on('keyup','.deltatimeSMA',function (){

                        var setting_deltaSMA = $(this).attr('setting_deltaSMA');
                        var deltatimeSMA   = $(this).val();
                        // console.log(deltatime);
                        $.get("{{ route('admin.add.deltaSMA') }}", {setting_deltaSMA: setting_deltaSMA, deltatimeSMA: deltatimeSMA});
                    });

                    $("body").on('keyup','.deltatimeRSI',function (){

                        var setting_deltaRSI = $(this).attr('setting_deltaRSI');
                        var deltatimeRSI   = $(this).val();
                        // console.log(deltatime);
                        $.get("{{ route('admin.add.deltaRSI') }}", {setting_deltaRSI: setting_deltaRSI, deltatimeRSI: deltatimeRSI});
                    });
                    
                    $("body").on('keyup','.volume',function (){

                        var setting_volume = $(this).attr('setting_volume');
                        var volume   = $(this).val();
                        // console.log(volume);
                        $.get("{{ route('admin.add.vol') }}", {setting_volume: setting_volume, volume: volume});
                    });

                    return {
                        // public functions
                        init: function () {
                            demos();
                        },
                    };
                }();

                jQuery(document).ready(function () {
                    KTBootstrapSwitch.init();
                });



                // var datatable = $('#kt_datatable').DataTable();
            </script>
@endsection
