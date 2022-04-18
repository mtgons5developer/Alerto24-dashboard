@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($city->name) ? $city->name : 'City' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('cities.city.index') }}" class="btn btn-primary mr-2" title="Show All City">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All City
                </a>

                <a href="{{ route('cities.city.create') }}" class="btn btn-success" title="Create New City">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New City
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

            <form method="POST" action="{{ route('cities.city.update', $city->id) }}" id="edit_city_form" name="edit_city_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('cities.form', [
                                        'city' => $city,
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
