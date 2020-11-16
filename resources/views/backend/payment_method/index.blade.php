@extends('layouts.backend_template')
@section('title', 'Payment Method')
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
                        <a href="{{ route('payment_method.create') }}" class="btn btn-sm btn-info float-right mb-2">Add New
                            <i class="fas fa-plus-circle"></i>
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
                                            <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                <a href="{{ route('payment_method.edit', $paymentMethod->id) }}"
                                                    class="btn btn-sm btn-info mr-1">Edit</a>
                                                <form method="post"
                                                    action="{{ route('payment_method.destroy', $paymentMethod->id) }}"
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