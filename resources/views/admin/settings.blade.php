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
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>


        @if(Session::has('success_message'))
            <div class="alert alert-success">
                <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
                {!! session('success_message') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif
        <div class="card">

            <h1 style=" margin-top: 15px; margin-left: 20px;"> Settings</h1>
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
                                	<option value="EMPTY">EMPTY</option>

                                </select>

                                <select class="form-control mr-2" name="timeframe" placeholder="Time Frame">
                                	<option value="">--- Select Time Frame ---</option>
                                	<option value="1m">1 minute</option>
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

                                <button type="submit" class="btn btn-success" style="margin-left: 20px;">+ADD</button>

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
                            <th>Quantity</th>
                            <th>Volume Trigger</th>
                            <th>Time Frame</th>
                            <th>Delta Time <br> Hours (ex. '24' hours)</th>
                            <th>Error</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($settings as $setting)


                            <tr>
{{--                                <form method="POST" action="{{route('admin.add.qty',['id'=>$setting->id])}}">--}}
{{--                                    @csrf--}}
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->pair }}</span>
                                    </td>
                                    {{--                                    <td>--}}
                                    {{--                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->entryPrice }}</span>--}}
                                    {{--                                    </td>--}}
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input  setting_id="{{ $setting->id }}" name="qty" class="quantity form-control form-control-sm" value="{{ $setting->qty }}" size="5"></span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_volume="{{ $setting->id }}" name="vol" class="volume form-control form-control-sm" value="{{ $setting->vol }}" size="5"></span>
                                    </td>

                                    <!--<input type="hidden" name="setting_id" class="setting_id" value="{{ $setting->id }}">-->
                                    <!--<input type="hidden" name="setting_delta" class="setting_delta" value="{{ $setting->id }}">-->
                                    <input type="hidden" name="setting_volume" class="setting_volume" value="{{ $setting->id }}">

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->timeframe }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_delta="{{ $setting->id }}" name="delta" class="deltatime form-control form-control-sm" value="{{ $setting->delta }}" size="5"></span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg error_log">{{ $setting->Error }}</span>
                                    </td>

                                    <td class="pr-0" style="display: flex; justify-content: space-between">
                                        <input
                                            id="checkbox{{$setting->id}}"
                                            class="bootstrap_switch" type="checkbox"
                                            seeting_id="{{ $setting->id }}"
                                            name="switch_{{$setting->id}}" {{ $setting->toggle != 2?'checked':'' }}
                                            data-on-text="ON" data-handle-width="30" data-off-text="OFF"
                                            data-on-color="primary"
                                        >
                                    {{-- <button type="submit" class="btn btn-success">Submit</button>--}}
                                        <a href="{{route('admin.settings_delete',['id'=>$setting->id])}}"
                                           onclick="return confirm(&quot;Click Ok to remove Pair.&quot;)"
                                           class="btn btn-danger"
                                        >Remove</a>
                                    </td>
{{--                                </form>--}}

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
                            onSwitchChange: function (event, state) {
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

                    $("body").on('keyup','.deltatime',function (){

                        var setting_delta = $(this).attr('setting_delta');
                        var deltatime   = $(this).val();
                        // console.log(deltatime);
                        $.get("{{ route('admin.add.delta') }}", {setting_delta: setting_delta, deltatime: deltatime});
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
