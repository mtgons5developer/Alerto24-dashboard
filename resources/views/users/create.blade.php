@extends('layouts.base')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New User</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All User
                </a>
            </div>

        </div>

        <div class="card-body">
            @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif


            <form method="POST" action="{{ route('users.user.store') }}" accept-charset="UTF-8" id="create_user_form" name="create_user_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('users.form', [
                                        'user' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


