@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Service Category</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('service_categories.service_category.index') }}" class="btn btn-primary" title="Show All Service Category">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Service Category
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('service_categories.service_category.store') }}" accept-charset="UTF-8" id="create_service_category_form" name="create_service_category_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('service_categories.form', [
                                        'serviceCategory' => null,
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


