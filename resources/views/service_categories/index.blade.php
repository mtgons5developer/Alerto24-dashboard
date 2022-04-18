@extends('layouts.base')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h5 class="my-1 float-left">Service Categories</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('service_categories.service_category.create') }}" class="btn btn-success"
                   title="Create New Service Category">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Service Category
                </a>
            </div>

        </div>

        @if(count($serviceCategories) == 0)
            <div class="card-body text-center">
                <h4>No Service Categories Available.</h4>
            </div>
        @else
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($serviceCategories as $serviceCategory)
                            <tr>
                                <td>{{ (($serviceCategories->currentPage() - 1) * $serviceCategories->perPage()) + $loop->iteration }}</td>

                                <td><b><h4 class="font-weight-bolder">{{ $serviceCategory->name }}</h4></b></td>
                                <td>{{ ($serviceCategory->is_active) ? 'Yes' : 'No' }}</td>

                                <td>

                                    <form method="POST"
                                          action="{!! route('service_categories.service_category.destroy', $serviceCategory->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('service_categories.service_category.show', $serviceCategory->id ) }}"
                                               title="Show Service Category">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('service_categories.service_category.edit', $serviceCategory->id ) }}"
                                               class="mx-4" title="Edit Service Category">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete Service Category"
                                                    onclick="return confirm(&quot;Click Ok to delete Service Category.&quot;)">
                                                <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
                                            </button>
                                        </div>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="card-footer">
                {!! $serviceCategories->render() !!}
            </div>

        @endif

    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function () {

        });
    </script>



@endsection


