@extends('layouts.base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($barangay->name) ? $barangay->name : 'Barangay' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('barangays.barangay.destroy', $barangay->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('barangays.barangay.index') }}" class="btn btn-primary mr-2" title="Show All Barangay">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Barangay
                    </a>

                    <a href="{{ route('barangays.barangay.create') }}" class="btn btn-success mr-2" title="Create New Barangay">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Barangay
                    </a>

                    <a href="{{ route('barangays.barangay.edit', $barangay->id ) }}" class="btn btn-primary mr-2" title="Edit Barangay">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Barangay
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Barangay" onclick="return confirm(&quot;Click Ok to delete Barangay.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Barangay
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $barangay->name }}</dd>
            <dt>Code</dt>
            <dd>{{ $barangay->code }}</dd>
            <dt>City Code</dt>
            <dd>{{ $barangay->city_code }}</dd>
            <dt>Province Code</dt>
            <dd>{{ $barangay->province_code }}</dd>
            <dt>Region Code</dt>
            <dd>{{ $barangay->region_code }}</dd>

        </dl>

    </div>
</div>

@endsection
