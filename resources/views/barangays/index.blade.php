@extends('layouts.base')

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

        <div class="card-header">

            <h5 class="my-1 float-left">Barangays</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('barangays.barangay.create') }}" class="btn btn-success" title="Create New Barangay">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Barangay
                </a>
            </div>
            <div class="clearfix"></div>
            <form action="{{ route('barangays.barangay.index') }}">
                <div class="row align-items-center">
                    <div class="col col">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                           id="kt_datatable_search_query" name="q" value="{{ $q ?? '' }}">
                                    <span>
																	<i class="flaticon2-search-1 text-muted"></i>
																</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                                <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">Search</button>
                            </div>

                        </div>
                    </div>

                </div>
            </form>


        </div>

        @if(count($barangays) == 0)
            <div class="card-body text-center">
                <h4>No Barangays Available.</h4>
            </div>
        @else
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>City Code</th>
                            <th>Province Code</th>
                            <th>Region Code</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($barangays as $barangay)
                            <tr>
                                <td>{{ (($barangays->currentPage() - 1) * $barangays->perPage()) + $loop->iteration }}</td>

                                <td>{{ $barangay->name }}</td>
                                <td>{{ $barangay->code }}</td>
                                <td>{{ $barangay->city_code }}</td>
                                <td>{{ $barangay->province_code }}</td>
                                <td>{{ $barangay->region_code }}</td>

                                <td>

                                    <form method="POST"
                                          action="{!! route('barangays.barangay.destroy', $barangay->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('barangays.barangay.show', $barangay->id ) }}"
                                               title="Show Barangay">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('barangays.barangay.edit', $barangay->id ) }}"
                                               class="mx-4" title="Edit Barangay">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete Barangay"
                                                    onclick="return confirm(&quot;Click Ok to delete Barangay.&quot;)">
                                                <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card-footer">
                {!! $barangays->render() !!}
            </div>

        @endif

    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

        });
    </script>



@endsection


