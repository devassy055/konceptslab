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
    
    <form method="POST" action="{{route('route.store')}}" autocomplete="FALSE" enctype='multipart/form-data'>
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
                      <label for="validationCustom01">Route</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticName" name="route" placeholder="Start loction - End location " value="{{ old('route', request('route')) }}">

                        @error('destination')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </td>
                <td>
                    <u>Select destination</u>
                    {{-- <select  name="destname" class="form-select" aria-label="Default select example" @error('destname') is-invalid @enderror multiple="">
                        @foreach($destname as $destname1)
                        <option></option>
                        <option value="{{$destname1->id}}">{{ $destname1->destination_name }}</option>
                        @endforeach
                    </select> --}}
                    <select name="destname" class="form-select" aria-label="Default select example">
                        <option selected>select a destination</option>
                        @foreach($destname as $destname1)
                        <option></option>
                        <option value="{{$destname1->id}}">{{ $destname1->destination_name }}</option>
                        @endforeach
                      </select>
                    {{-- <script>
                        $('#myselect').select2({
                            width: '100%',
                            placeholder: "Select an Option",
                            allowClear: true
                        });
                    </script> --}}



                <td>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
                </td>
            </tr>
        </tbody>
</div>
@endsection
