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

            <h5 class="my-1 float-left">Provinces</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('provinces.province.create') }}" class="btn btn-success" title="Create New Province">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Province
                </a>
            </div>

        </div>

        @if(count($provinces) == 0)
            <div class="card-body text-center">
                <h4>No Provinces Available.</h4>
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
                            <th>Region Code</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($provinces as $province)
                            <tr>
                                <td>{{ (($provinces->currentPage() - 1) * $provinces->perPage()) + $loop->iteration }}</td>
                                <td>{{ $province->name }}</td>
                                <td>{{ $province->code }}</td>
                                <td>{{ $province->psgc_code }}</td>
                                <td>{{ $province->region_code }}</td>

                                <td>

                                    <form method="POST"
                                          action="{!! route('provinces.province.destroy', $province->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('provinces.province.show', $province->id ) }}"
                                               title="Show Province">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('provinces.province.edit', $province->id ) }}"
                                               class="mx-4" title="Edit Province">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete Province"
                                                    onclick="return confirm(&quot;Click Ok to delete Province.&quot;)">
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
                {!! $provinces->render() !!}
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


