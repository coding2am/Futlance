@extends('layouts.backend_template')
@section('title', 'Quarter Create')
@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Quarter Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quarter.index') }}">Quarters</a></li>
                            <li class="breadcrumb-item active">Quarter Form</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">

                <div class="col-md-12">
                    <div class="card offset-md-2 col-md-8 table-border border-dark rounded p-2">
                        <div>
                            <h2 class="text text-center text-muted my-3">Quarter Registraction Form</h2>
                        </div>
                        
                        <div class="card-body">
                            <form method="post" action="{{ route('quarter.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="enter a quarter name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <select name="city" class="form-control">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
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
    <!-- /Main Wrapper -->
@endsection
