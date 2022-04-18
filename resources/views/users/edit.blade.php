@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($user->name) ? $user->name : 'User' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('users.user.index') }}" class="btn btn-primary mr-2" title="Show All User">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All User
                </a>

                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New User
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

            <form method="POST" action="{{ route('users.user.update', $user->id) }}" id="edit_user_form" name="edit_user_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('users.form', [
                                        'user' => $user,
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
