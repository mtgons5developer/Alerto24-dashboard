@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($region->name) ? $region->name : 'Region' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('regions.region.index') }}" class="btn btn-primary mr-2" title="Show All Region">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Region
                </a>

                <a href="{{ route('regions.region.create') }}" class="btn btn-success" title="Create New Region">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Region
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('regions.region.update', $region->id) }}" id="edit_region_form" name="edit_region_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('regions.form', [
                                        'region' => $region,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
