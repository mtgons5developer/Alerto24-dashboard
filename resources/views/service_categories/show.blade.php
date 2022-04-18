@extends('layouts.base')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($serviceCategory->name) ? $serviceCategory->name : 'Service Category' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('service_categories.service_category.destroy', $serviceCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('service_categories.service_category.index') }}" class="btn btn-primary mr-2" title="Show All Service Category">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Service Category
                    </a>

                    <a href="{{ route('service_categories.service_category.create') }}" class="btn btn-success mr-2" title="Create New Service Category">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Service Category
                    </a>

                    <a href="{{ route('service_categories.service_category.edit', $serviceCategory->id ) }}" class="btn btn-primary mr-2" title="Edit Service Category">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Service Category
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Service Category" onclick="return confirm(&quot;Click Ok to delete Service Category.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Service Category
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $serviceCategory->name }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($serviceCategory->is_active) ? 'Yes' : 'No' }}</dd>
            <dt>Description</dt>
            <dd>{{ $serviceCategory->description }}</dd>

        </dl>

    </div>
</div>

@endsection
