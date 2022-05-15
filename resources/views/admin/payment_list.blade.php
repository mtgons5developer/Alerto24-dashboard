@extends('admin_layouts.base')

@section('content')

    <div>
        <div class="card">
            <h1 style=" margin-top: 15px; margin-left: 20px;">Payment List</h1>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        {{--                        <table style="overflow: hidden;"  class="table table-head-custom table-vertical-center table-head-bg table-borderless">--}}
                        <thead>
                        <tr class="text-left">
                            <th>ID</th>
                            <th>Side</th>


                        </tr>
                        </thead>
                        <tbody  id="myTable">
                        @foreach ($payments as $payment)

                            <tr>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Col 1</span>
                                </td>

                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Col 2</span>
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
