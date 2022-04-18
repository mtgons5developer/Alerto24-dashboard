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

            <h5 class="my-1 float-left">Users</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New User
                </a>
            </div>

        </div>

        @if(count($users) == 0)
            <div class="card-body text-center">
                <h4>No Users Available.</h4>
            </div>
        @else
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verified</th>
                            <th>User Type</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ (($users->currentPage() - 1) * $users->perPage()) + $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                    @if($user->email_verified_at == null)
                                        <i class="badge badge-danger">No</i>
                                    @else
                                        <i class="badge badge-success">Yes</i>

                                    @endif
                                </td>
                                <td>{{ $user->user_type }}</td>

                                <td>

                                    <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-sm float-right " role="group">
                                            <a href="{{ route('users.user.show', $user->id ) }}" title="Show User">
                                                <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('users.user.edit', $user->id ) }}" class="mx-4"
                                               title="Edit User">
                                                <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                            </a>

                                            <button type="submit" style="border: none;background: transparent"
                                                    title="Delete User"
                                                    onclick="return confirm(&quot;Click Ok to delete User.&quot;)">
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
                {!! $users->render() !!}
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


