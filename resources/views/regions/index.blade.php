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

            <h5 class="my-1 float-left">Regions</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('regions.region.create') }}" class="btn btn-success" title="Create New Region">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Region
                </a>
            </div>

        </div>

        @if(count($regions) == 0)
            <div class="card-body text-center">
                <h4>No Regions Available.</h4>
            </div>
        @else
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Psgc Code</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($regions as $region)
                            <tr>
                                <td>{{ (($regions->currentPage() - 1) * $regions->perPage()) + $loop->iteration }}</td>
                                <td>{{ $region->name }}</td>
                                <td>{{ $region->code }}</td>
                                <td>{{ $region->psgc_code }}</td>

                                <td>

                                    <form method="POST" action="{!! route('regions.region.destroy', $region->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('regions.region.show', $region->id ) }}"
                                               title="Show Region">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('regions.region.edit', $region->id ) }}" class="mx-4"
                                               title="Edit Region">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete Region"
                                                    onclick="return confirm(&quot;Click Ok to delete Region.&quot;)">
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
                {!! $regions->render() !!}
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


