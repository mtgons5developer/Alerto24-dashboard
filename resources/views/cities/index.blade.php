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

            <h5 class=" float-left">

                <div class="form-group">
                    <h3>Cities</h3>


                </div>
            </h5>


            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('cities.city.create') }}" class="btn btn-success" title="Create New City">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New City
                </a>
            </div>
            <div class="clearfix"></div>
            <form action="{{ route('cities.city.index') }}">
                <div class="row align-items-center">
                    <div class="col col">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..."
                                           id="kt_datatable_search_query" name="q" value="{{ $q??'' }}">
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

        @if(count($cities) == 0)
            <div class="card-body text-center">
                <h4>No Cities Available.</h4>
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
                            <th>Province Code</th>
                            <th>Psgc Code</th>
                            <th>Region Desc</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cities as $city)
                            <tr>
                                <td>{{ (($cities->currentPage() - 1) * $cities->perPage()) + $loop->iteration }}</td>

                                <td>{{ $city->name }}</td>
                                <td>{{ $city->code }}</td>
                                <td>{{ $city->province_code }}</td>
                                <td>{{ $city->psgc_code }}</td>
                                <td>{{ $city->region_desc }}</td>

                                <td>

                                    <form method="POST" action="{{ route('cities.city.destroy', $city->id) }}"
                                          accept-charset="UTF-8">
                                        {{ method_field('DELETE') }}
                                        @csrf

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('cities.city.show', $city->id ) }}" title="Show City">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('cities.city.edit', $city->id ) }}" class="mx-4"
                                               title="Edit City">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete City"
                                                    onclick="return confirm('Click Ok to delete City.')">
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
                {!! $cities->render() !!}
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


