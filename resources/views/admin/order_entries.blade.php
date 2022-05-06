@extends('admin_layouts.base')
@section('content')

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

        <h1 style=" margin-top: 15px; margin-left: 20px;"> Order Entry</h1>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="kt_datatable">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>OrderId</th>
                        <th>Entry Price</th>
                        <th>Quantity</th>
                        <th>Entry Date</th>
                        <th>Status</th>
                        <th>OrderIdTP</th>
                        <th>Take Profit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order_entries as $order_entry)
                        <tr>
                            <td>{{ $counter++ }}</td>
                            <td>{{ $order_entry->orderId }}</td>
                            <td>{{ $order_entry->entryPrice }}</td>
                            <td>{{ $order_entry->qty }}</td>
                            <td>{{ $order_entry->entry_date }}</td>
                            <td>


                                <input
                                    id="checkbox{{$order_entry->id}}"
                                    class="bootstrap_switch" type="checkbox"
                                    order_entry_id="{{ $order_entry->id }}"
                                    name="switch_{{$order_entry->id}}" {{ $order_entry->status != 2?'checked':'' }}
                                    data-on-text="Intrade" data-handle-width="80" data-off-text="Cancel"
                                    data-on-color="primary"
                                >
                            </td>
                            <td>{{ $order_entry->orderIdTP }}</td>
                            <td>{{ $order_entry->close_pos }}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        var datatable = $('#kt_datatable').DataTable();
        $(document).ready(function () {
// Class definition

            $('#checkbox16').change(function () {
                alert($(this).attr('order_entry_id'))
            });

            var KTBootstrapSwitch = function () {

                // Private functions
                var demos = function () {
                    // minimum setup
                    $('.bootstrap_switch').bootstrapSwitch({
                        onSwitchChange: function (event, state) {
                            let order_entry_id = $(event.target).attr('order_entry_id');
                            $.get("{{ route('change_order_entry_status') }}", {order_entry_id: order_entry_id, status: state});

                        }
                    });
                };

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


        });
    </script>

@endsection


