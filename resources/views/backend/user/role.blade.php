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
            <div class="card table-border border-info">
                <div class="card-title bg-info text-light p-3">
                    <h4 class="text-center">{{ $user->name }}'s Role Management</h4>
                </div>
                <div class="card-body col-md-8 offset-md-2">
                    <form method="post" action="{{ route('user.roleUpdate', $user->id) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="role">
                                <h5>Role</h5>
                            </label>
                            <select name="role" id="role" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" @if ($role->id == $user->roles[0]->id)
                                        selected="selected"
                                @endif
                                >{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Update Role">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->
    @endsection
