@extends('layouts.backend_template')
@section('title', 'role management')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Role Management</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Customers</a></li>
                            <li class="breadcrumb-item active">Role Management</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card offset-md-2 col-md-8 table-border border-dark rounded p-2">
                        <div>
                            <h2 class="text text-center text-muted my-3">User Role Management</h2>
                        </div>
                        <div class="card-body">
                            {{-- flash back message start--}}
                            @if (!empty(session()->get('success')))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong class="mr-1">Success!</strong>{!! session()->get('success') !!}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- flash back message end--}}
                            <form method="post" action="{{ route('user.roleUpdate', $user->id) }}">
                                @csrf
                                @method('put')
                                <div class="row no-gutters">
                                    <div class="form-group col-md-6">
                                        <select name="role" id="role" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" @if ($role->id == $user->roles[0]->id)
                                                    selected="selected"
                                            @endif
                                            >{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-block btn-dark">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- /Page Wrapper -->
    @endsection
