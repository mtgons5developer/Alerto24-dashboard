@extends('layouts.base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($province->name) ? $province->name : 'Province' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('provinces.province.destroy', $province->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('provinces.province.index') }}" class="btn btn-primary mr-2" title="Show All Province">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Province
                    </a>

                    <a href="{{ route('provinces.province.create') }}" class="btn btn-success mr-2" title="Create New Province">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Province
                    </a>

                    <a href="{{ route('provinces.province.edit', $province->id ) }}" class="btn btn-primary mr-2" title="Edit Province">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Province
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Province" onclick="return confirm(&quot;Click Ok to delete Province.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Province
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $province->name }}</dd>
            <dt>Code</dt>
            <dd>{{ $province->code }}</dd>
            <dt>Psgc Code</dt>
            <dd>{{ $province->psgc_code }}</dd>
            <dt>Region Code</dt>
            <dd>{{ $province->region_code }}</dd>

        </dl>

    </div>
</div>

@endsection
