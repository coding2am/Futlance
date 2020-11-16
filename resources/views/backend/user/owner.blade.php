@extends('layouts.backend_template')
@section('title', 'owners')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Owner</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Owners</li>
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
                                            <th>Action</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($owners as $owner)
                                            <tr>
                                                <td>{{ $num++ }}</td>
                                                <td>{{ $owner->name }}</td>
                                                <td>
                                                    <span class="text-dark">{{ $owner->email }}</span>
                                                </td>
                                                <td>{{ $owner->phone }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a href="{{ route('user.show', $owner->id) }}"
                                                            class="btn btn-primary">Detail</a>
                                                        <a href="{{ route('user.role', $owner->id) }}"
                                                            class="btn btn-info">Manage Role</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($owner->status == 0)
                                                        <div>
                                                            <form method="post"
                                                                action="{{ route('user.off', $owner->id) }}">
                                                                @csrf
                                                                <button type="submit" class="submitIcon">
                                                                    <i class="fas fa-toggle-on statusTogglerOn fa-2x"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @else
                                                        <div>
                                                            <form method="post" action="{{ route('user.on', $owner->id) }}">
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
