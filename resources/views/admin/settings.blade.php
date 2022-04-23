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

    <div>
        <div class="card">
            <h1 style=" margin-top: 15px; margin-left: 20px;"> Setting</h1>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="kt_datatable">
                        {{--                        <table style="overflow: hidden;"  class="table table-head-custom table-vertical-center table-head-bg table-borderless">--}}
                        <thead>
                        <tr class="text-left">
                            <th >
                                <span class="text-dark-75">Pair</span>
                            </th>
                            <th>Entry Price</th>
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
                                <form method="POST" action="{{route('admin.add.qty',['id'=>$setting->id])}}">
                                    @csrf
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->pair }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->entryPrice }}</span>
                                    </td>
                                    <td class="flex">


                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input name="qty" value="{{ $setting->qty }}"></span>

                                    </td>
                                    <td>

                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->timeframe }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg"><input name="datetime" type="date" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',  $setting->datetime)->format('Y-m-d') }}"></span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $setting->Error }}</span>
                                    </td>

                                    <td class="pr-0" style="display: flex; justify-content: space-between">
                                        @if($setting->toggle == 0)
                                            <label class="switch">
                                                <input type="checkbox" name="toggle" >
                                                <span class="slider round"></span>
                                            </label>
                                        @elseif($setting->toggle == 1)
                                            <label class="switch">
                                                <input type="checkbox" name="toggle"  checked>
                                                <span class="slider round"></span>
                                            </label>
                                        @endif
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </td>
                                </form>
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
                var datatable = $('#kt_datatable').DataTable();
            </script>
@endsection
