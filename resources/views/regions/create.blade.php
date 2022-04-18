@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Region</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('regions.region.index') }}" class="btn btn-primary" title="Show All Region">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Region
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('regions.region.store') }}" accept-charset="UTF-8" id="create_region_form" name="create_region_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('regions.form', [
                                        'region' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


