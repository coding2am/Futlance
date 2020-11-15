@extends('layouts.backend_template')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Appointments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
						
                <!-- Cities -->
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('city.create') }}" class="btn btn-info float-right">Add New</a>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($cities as $city)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>
                                            <a href="{{ route('city.edit', $city->id) }}" class="btn btn-warning">Edit</a>
                                              <form method="post" action="{{ route('city.destroy', $city->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
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
                <!-- /cities -->
							
            </div>
        </div>
    </div>			
</div>
<!-- /Page Wrapper -->
@endsection