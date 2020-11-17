@extends('layouts.backend_template')
@section('title', 'Court Edit')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Court Edit Form</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('court.index') }}">Courts</a></li>
                        <li class="breadcrumb-item active">Court Edit Form</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card offset-md-2 col-md-8 table-border border-dark rounded p-2">
                    <div>
                        <h2 class="text text-center text-muted my-3">Court Registraction Form</h2>
                    </div>
                        <form method="post" action="{{ route('court.update',$court->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row no-gutters">
                                {{-- photo --}}
                                <div class="form-group col-md-4 offset-md-1">
                                    <label>Photo: (<small class="text-danger">*only allow jpeg, jpg, bmp, png</small>)</label>
    
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                                aria-controls="home" aria-selected="true">Old Photo</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                                aria-controls="profile" aria-selected="false">New Photo</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-3" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <img src="{{ asset($court->photo) }}" class="img-fluid table-bordered border-dark rounded" width="200" height="100">
                                            <input type="hidden" name="oldphoto" value="{{ $court->photo }}">
                                        </div>
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            <input type="file" name="photo"
                                                class="form-control-file @error('photo') is-invalid @enderror">
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="row no-gutters">
                                {{-- name --}}
                                <div class="form-group col-md-4 offset-md-1">
                                    <label>Name</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $court->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- price --}}
                                <div class="form-group col-md-4 offset-md-1">
                                    <label>Price <span class="text-muted">(Price per hour)</span></label>
                                    <div>
                                        <input name="price" type="number"
                                            class="form-control @error('price') is-invalid @enderror"
                                            value="{{ $court->price_per_hour }}">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                {{-- city --}}
                                <div class="form-group col-md-4 offset-md-1">
                                    <label>City</label>
                                    <div>
                                        <select name="quarter" class="custom-select city">
                                            <optgroup label="Choose City">
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                {{-- quarter --}}
                                <div class="form-group col-md-4 offset-md-1">
                                    <label>Quarter</label>
                                    <div>
                                        <select name="quarter" class="custom-select quarter" disabled="true">
                                            <optgroup label="Choose Quarter" class="quarter_option">
                                                @foreach ($quarters as $quarter)
                                                    <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                {{-- owner user_id --}}
                                <input name="user_id" type="hidden" value="{{ $court->user_id }}">
                                {{-- button --}}
                                <div class="form-group col-md-9 offset-md-1">
                                    <button type="submit" class="btn btn-block btn-dark">Update</button>
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
@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.city').change(function() {
                let city_id = $(this).val();
                // alert(city_id);
                $.post("{{ route('filterCity') }}", {
                    cid: city_id
                }, function(response) {
                    //   console.log(response);
                    var html = "";
                    for (let row of response) {
                        html += `<option value="${row.id}">${row.name}</option>`;
                    }
                    $('.quarter_option').html(html);
                    $('.quarter').prop('disabled', false);

                })
            })
        })

    </script>
@endsection
