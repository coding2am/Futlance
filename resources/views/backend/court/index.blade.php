@extends('layouts.backend_template')
@section('title', 'Court')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Courts</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Courts</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">

                    <!-- Recent Orders -->
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('court.create') }}" class="btn btn-sm btn-info float-right mb-2">
                                <i class="fas fa-plus"></i> Add New
                            </a>
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
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Quarter</th>
                                            <th>Owner</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($courts as $court)
                                            <tr>
                                                <td>{{ $i++ }}.</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                    <a href="{{ route('court.show',$court->id) }}" class="avatar avatar-sm mr-2"><img
                                                                class="avatar-img mr-2"
                                                                src="{{ asset($court->photo) }}"
                                                                alt="Court Image">{{ substr($court->name,0,10) }} ...</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $court->quarter->name }}</td>
                                                <td>{{ $court->user->name }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                        <a href="{{ route('court.show',$court->id) }}"
                                                            class="btn btn-sm btn-info mr-1">
                                                            Detail
                                                        </a>
                                                        <a href="{{ route('court.edit', $court->id) }}"
                                                            class="btn btn-sm btn-warning mr-1">
                                                            Edit
                                                        </a>
                                                        <form method="post"
                                                        action="{{ route('court.destroy', $court->id) }}"
                                                            class="d-inline-block"
                                                            onsubmit="return confirm('Are you Sure to Delete?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" name="btnsubmit" value="Delete"
                                                                class="btn btn-sm btn-danger">
                                                        </form>
                                                    </div>
                                                </td>
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
