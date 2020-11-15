@extends('layouts.backend_template')
@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
				
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Court Form</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('court.index') }}">Courts</a></li>
                        <li class="breadcrumb-item active">Court Form</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Court Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('court.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    {{-- Photo --}}
                                    <div class="form-group">
                                        <label class="col-lg-4">Photo:(<small class="text-danger">* jpeg|bmp|png</small>)</label>
                                        <div class="col-lg-8">
                                            <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror">
                                            @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- /Photo --}}
                                    {{-- Name --}}
                                    <div class="form-group">
                                        <label class="col-lg-3 col-form-label">Name</label>
                                        <div class="col-lg-9">
                                            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- /Name --}}
                                    {{-- Price --}}
                                    <div class="form-group">
                                        <label class="col-lg-3 col-form-label">Price</label>
                                        <div class="col-lg-9">
                                            <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- /Price --}}
                                    {{-- City --}}
                                    <div class="form-group">
                                        <label class="col-lg-3 col-form-label">City</label>
                                        <div class="col-lg-9">
                                            <select name="quarter" class="custom-select city">
                                                <optgroup label="Choose City">
                                                    @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                  </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- /City --}}
                                    {{-- Quarter --}}
                                    <div class="form-group">
                                        <label class="col-lg-3 col-form-label">Quarter</label>
                                        <div class="col-lg-9">
                                            <select name="quarter" class="custom-select quarter" disabled="true">
                                                <optgroup label="Choose Quarter" class="quarter_option">
                                                    @foreach($quarters as $quarter)
                                                    <option value="{{ $quarter->id }}">{{ $quarter->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- /Quarter --}}
                                    <div class="form-group ml-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
@section('script')
  <script type="text/javascript">
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('.city').change(function () {
        let city_id = $(this).val();
        // alert(city_id);
        $.post("{{route('filterCity')}}",{cid:city_id},function (response) {
        //   console.log(response);
          var html = "";
          for(let row of response){
            html+=`<option value="${row.id}">${row.name}</option>`;
          }
          $('.quarter_option').html(html);
          $('.quarter').prop('disabled',false);
          
        })
      })
    })
  </script>
@endsection