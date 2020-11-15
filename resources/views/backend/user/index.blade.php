@extends('layouts.backend_template')
@section('title', 'customers')
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
                            <li class="breadcrumb-item active">Customers</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        @php
                                        $num = 1;
                                        @endphp
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Phone</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    <span class="text-dark">{{ $user->email }}</span>
                                                </td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    <span class="badge badge-dark">{{ $user->getRoleNames()[0] }}</span>
                                                </td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a href="{{ route('user.show', $user->id) }}"
                                                            class="btn btn-primary">Detail</a>
                                                        <a href="{{ route('user.role', $user->id) }}"
                                                            class="btn btn-info">Manage Role</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($user->status == 0)
                                                        <div>
                                                            <form method="post" action="{{ route('user.off', $user->id) }}">
                                                                @csrf
                                                                <button type="submit" class="submitIcon">
                                                                    <i class="fas fa-toggle-on statusTogglerOn fa-2x"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <form method="post" action="{{ route('user.on', $user->id) }}">
                                                                @csrf
                                                                <button type="submit" class="submitIcon">
                                                                    <i
                                                                        class="fas fa-toggle-on statusTogglerOff fa-2x fa-flip-horizontal"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                <td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Recent Orders -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
