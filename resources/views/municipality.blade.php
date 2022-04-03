@extends('layouts.base')

@section('content')

<style>
    .clickable:hover {
        color: #1BC5BD;
        background-color: #C9F7F5;
    } .modal:hover {
        color: black;
        background-color: transparent;
    }
</style>
<div>
    <div class="card">

        <div class="card-body">

            <div class="row">
                @foreach ($user_groups as $name => $users)
                <div class="col-2 rounded clickable border m-2 p-2" style="cursor: pointer;" data-toggle="modal" data-target="#{{ $name }}">
                    <div class="row">
                        <div class="col-8">
                            <h5> {{ $name }}</h5>
                        </div>
                        <div class="col-4">
                            <span class="badge badge-primary badge-sm">{{ count($users) }}</span>

                        </div>
                    </div>


                    <div class="modal fade" id="{{ $name }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <ul class="list-group">

                                        @foreach ($users as $i => $user)
                                        <li class="list-group-item">
                                            {{ $i+1 }}. {{ $user['name'] }} - {{ $user['contact_no'] }}
                                            <br>
                                            <small> {{ $user['streetAddress'] }}, {{ $user['city'] }}, {{ $user['cityCode'] }}</small>
                                        </li>

                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    // var datatable = $('#kt_datatable').DataTable();
</script>
@endsection