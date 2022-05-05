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
                        <div class="col-md-12">
                                <input name="pair" placeholder="Add Pair" style="color: #3F4254; background-color: #ffffff; background-clip: padding-box; border: 1px solid #E4E6EF; padding-top: 10px; padding-bottom: 10px;">
                                <button type="submit" class="btn btn-success" style="margin-left: 20px;">+ Pair</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="kt_datatable">
                        {{--                        <table style="overflow: hidden;"  class="table table-head-custom table-vertical-center table-head-bg table-borderless">--}}
                        <thead>
                        <tr class="text-left">
                            <th >
                                <span class="text-dark-75">Pair</span>
                            </th>
                            {{--                            <th>Entry Price</th>--}}
                            <th>Quantity</th>
                            <th>Time Frame</th>
                            <th>Date</th>
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
                                    <td class="flex">
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_id="{{ $setting->id }}" name="qty" class="quantity" value="{{ $setting->qty }}"></span>
                                    </td>
                                    <input type="hidden" name="setting_id" class="setting_id" value="{{ $setting->id }}">
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->timeframe }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input setting_id="{{ $setting->id }}" name="datetime" class="datetime" type="date" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $setting->datetime)->format('Y-m-d') }}"></span>
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
                                            data-on-text="ON" data-handle-width="40" data-off-text="OFF"
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
                                } else {
                                    var parent = $(this).parent().parent().parent().parent();
                                    parent.find('.error_log').text("1");
                                }

                            }
                        });
                    };
                    $("body").on('keyup','.quantity',function (){

                        var setting_id = $(this).attr('setting_id');
                        var quantity   = $(this).val();
                        console.log(quantity);
                        $.get("{{ route('admin.add.qty') }}", {setting_id: setting_id, quantity: quantity});
                    });

                    $("body").on('change','.datetime',function (){
                        var setting_id = $(this).attr('setting_id');
                        var datetime   = $(this).val();
                        $.get("{{ route('admin.add.qty') }}", {setting_id: setting_id, datetime: datetime});
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



                var datatable = $('#kt_datatable').DataTable();
            </script>
@endsection
