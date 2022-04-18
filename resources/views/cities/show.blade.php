@extends('layouts.base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($city->name) ? $city->name : 'City' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('cities.city.destroy', $city->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cities.city.index') }}" class="btn btn-primary mr-2" title="Show All City">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All City
                    </a>

                    <a href="{{ route('cities.city.create') }}" class="btn btn-success mr-2" title="Create New City">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New City
                    </a>

                    <a href="{{ route('cities.city.edit', $city->id ) }}" class="btn btn-primary mr-2" title="Edit City">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit City
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete City" onclick="return confirm(&quot;Click Ok to delete City.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete City
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $city->name }}</dd>
            <dt>Code</dt>
            <dd>{{ $city->code }}</dd>
            <dt>Province Code</dt>
            <dd>{{ $city->province_code }}</dd>
            <dt>Psgc Code</dt>
            <dd>{{ $city->psgc_code }}</dd>
            <dt>Region Desc</dt>
            <dd>{{ $city->region_desc }}</dd>

        </dl>

    </div>
</div>

@endsection
