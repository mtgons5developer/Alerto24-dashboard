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

            <div class="card-body">

                <div >
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table style="overflow: hidden;" id="kt_datatable" class="table table-head-custom table-vertical-center table-head-bg table-borderless">
                            <thead>
                            <tr class="text-left">
                                <th>Side</th>
                                <th>Symbol</th>
                                <th >
                                    <span class="text-dark-75">OrderID</span>
                                </th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Realized Pnl</th>
                                <th>Quote Quantity</th>
                                <th>Margin Asset</th>
                                <th>Commission</th>
                                <th>Commission Asset</th>
                                <th>Time</th>
                                <th>Position Side</th>
                                <th>Buyer</th>
                                <th>Maker</th>
                            </tr>
                            </thead>
                            <tbody  id="myTable">
                            @foreach ($trade_histories as $trade_history)


                                <tr>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->symbol }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->orderId }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->side }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->price }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->qty }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->realizedPnl }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->quoteQty }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->marginAsset }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->commission }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->commissionAsset }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->time }}</span>
                                    </td>

                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->positionSide }}</span>
                                    </td>


                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->buyer }}</span>
                                    </td>
                                    <td>
                                        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->maker }}</span>
                                    </td>


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        var datatable = $('#kt_datatable').DataTable();

            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
@endsection
