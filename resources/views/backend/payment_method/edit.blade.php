@extends('layouts.backend_template')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Payment Method Edit</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Payment Methods</a></li>
                        <li class="breadcrumb-item active">Payment Method Edit</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Method Edit</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('payment_method.update', $paymentMethod->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="offset-md-3 col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-9">
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $paymentMethod->name }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
				
    </div>			
</div>
<!-- /Main Wrapper -->
@endsection