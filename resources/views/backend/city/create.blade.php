@extends('layouts.backend_template')
@section('title', 'City Create')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">City Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('city.index') }}">Cities</a></li>
                            <li class="breadcrumb-item active">City Form</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- /Page Header -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card offset-md-2 col-md-8 table-border border-dark rounded p-2">
                        <div>
                            <h2 class="text text-center text-muted my-3">City Registraction Form</h2>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('city.store') }}">
                                @csrf
                                <div class="row no-gutters">
                                    <div class="form-group col-md-6">
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="enter a city name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-block btn-dark">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
