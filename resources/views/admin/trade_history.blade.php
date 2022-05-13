@extends('admin_layouts.base')

@section('content')

    <div>
        <div class="card">
            <h1 style=" margin-top: 15px; margin-left: 20px;"> Trade History</h1>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="kt_datatable">
                        {{--                        <table style="overflow: hidden;"  class="table table-head-custom table-vertical-center table-head-bg table-borderless">--}}
                        <thead>
                        <tr class="text-left">
                            <th>ID</th>
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

                        </tr>
                        </thead>
                        <tbody  id="myTable">
                        @foreach ($trade_histories as $trade_history)

                            <tr>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->uuid }}</span>
                                </td>                                
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->side }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->symbol }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->orderId }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ number_format($trade_history->price) }}</span>
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
                                    <!--$timestamp={{ $trade_history->time }};-->
                                    <!--echo $display_date->format('d-m-Y H:i:s')-->
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                        {{ 
                                            gmdate("Y-m-d h:m:s", substr($trade_history->time, 0, -3) )                                       
                                        }}</span>
                                </td>

                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $trade_history->positionSide }}</span>
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
