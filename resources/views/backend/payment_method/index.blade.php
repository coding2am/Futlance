@extends('layouts.backend_template')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Payment Methods</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Payment Methods</li>
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
                        <a href="{{ route('payment_method.create') }}" class="btn btn-info float-right">Add New</a>
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($paymentMethods as $paymentMethod)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $paymentMethod->name }}</td>
                                        <td>
                                            <a href="{{ route('payment_method.edit', $paymentMethod->id) }}" class="btn btn-warning">Edit</a>
                                            <form method="post" action="{{ route('payment_method.destroy', $paymentMethod->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
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