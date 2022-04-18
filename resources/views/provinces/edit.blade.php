@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($province->name) ? $province->name : 'Province' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('provinces.province.index') }}" class="btn btn-primary mr-2" title="Show All Province">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Province
                </a>

                <a href="{{ route('provinces.province.create') }}" class="btn btn-success" title="Create New Province">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Province
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

            <form method="POST" action="{{ route('provinces.province.update', $province->id) }}" id="edit_province_form" name="edit_province_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('provinces.form', [
                                        'province' => $province,
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
