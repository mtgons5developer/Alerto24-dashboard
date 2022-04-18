@extends('layouts.base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($region->name) ? $region->name : 'Region' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('regions.region.destroy', $region->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('regions.region.index') }}" class="btn btn-primary mr-2" title="Show All Region">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Region
                    </a>

                    <a href="{{ route('regions.region.create') }}" class="btn btn-success mr-2" title="Create New Region">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Region
                    </a>

                    <a href="{{ route('regions.region.edit', $region->id ) }}" class="btn btn-primary mr-2" title="Edit Region">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Region
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Region" onclick="return confirm(&quot;Click Ok to delete Region.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Region
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $region->name }}</dd>
            <dt>Code</dt>
            <dd>{{ $region->code }}</dd>
            <dt>Psgc Code</dt>
            <dd>{{ $region->psgc_code }}</dd>

        </dl>

    </div>
</div>

@endsection
