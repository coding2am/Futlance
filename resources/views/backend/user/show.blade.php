@extends('layouts.backend_template')
@section('title', 'customer detail')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Customers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Customers</a></li>
                            <li class="breadcrumb-item active">User Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="card bg-light table-border border-info">
                <div class="card-header bg-info text-light">
                    <h4 class="text-center">{{ $user->name }}'s Information</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        {{-- name & phone number --}}
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="name">
                                    <h6>Name</h6>
                                </label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                                    readonly>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">
                                    <h6>Phone number</h6>
                                </label>
                                <input type="number" name="phone" id="phone" class="form-control" value="{{ $user->phone }}"
                                    readonly>

                            </div>
                        </div>

                        {{-- email & address --}}
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="email">
                                    <h6>E-mail</h6>
                                </label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                                    readonly>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="address">
                                    <h6>Address</h6>
                                </label>
                                <textarea name="address" id="address" name="address" rows="3" class="form-control"
                                    readonly>{{ $user->address }}</textarea>
                            </div>
                        </div>

                        {{-- roles & created at --}}
                        <div class="row col-md-12">
                            <div class="form-group col-md-6">
                                <label for="role">
                                    <h6>Role</h6>
                                </label>
                                <input type="text" id="role" class="form-control" value="{{ $user->getRoleNames()[0] }}"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="create">
                                    <h6>Created at</h6>
                                </label>
                                <input type="text" id="create" class="form-control"
                                    value="{{ $user->created_at->diffForHumans() }}" readonly>
                            </div>
                        </div>


                        {{-- buttons --}}
                        <div class="row col-md-12">
                            <div class="form-group col-md-4">
                                <a href="{{ route('user.index') }}" class="btn btn-block btn-outline-info">Go Back</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->
    @endsection
