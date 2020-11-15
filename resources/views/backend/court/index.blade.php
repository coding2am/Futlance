@extends('layouts.backend_template')
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
                        <a href="{{ route('court.create') }}" class="btn btn-info float-right">Add New</a>
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
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle mr-2" src="{{asset($court->photo)}}" alt="Court Image">{{ $court->name }}</a>
                                            </h2>                                           
                                        </td>
                                        <td>{{ $court->quarter->name }}</td>
                                        <td>{{ $court->user->name }}</td>
                                        <td>
                                            <a href="{{ route('court.edit', $court->id) }}" class="btn btn-warning">Edit</a>
                                              <form method="post" action="{{ route('court.destroy', $court->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                                              </form>
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