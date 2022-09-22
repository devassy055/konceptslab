@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!--     <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div> 
-->
        </div>
    </div>
    
    <form method="POST" action="{{route('user.store')}}" autocomplete="FALSE" enctype='multipart/form-data'>
        @csrf
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th></th>
                <th></th>
            <!--  <th>Edit</th>
                <th>Delete</th>
            -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> 
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationCustom01">Destinations</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticName" name="destination" placeholder="Enter destination" value="{{ old('destination', request('destination')) }}">

                        @error('destination')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </td>
                <td>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationCustom01">Fee</label>
                      <input type="text" class="form-control-plaintext" id="staticName" name="fee" placeholder="Enter destination" value="{{ old('fee', request('fee')) }}">

                      @error('fee')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div></td>
                <td>
                    <button class="btn btn-primary" type="submit">Submit</button>
                    {{-- <a class="btn btn-outline-warning rounded-pill" href="{{ Route('user.store')}}">Save</a></th> --}}
                </form>
                </td>
            </tr>
        </tbody>
</div>
@endsection
