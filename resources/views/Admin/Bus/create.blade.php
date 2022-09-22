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
    
    <form method="POST" action="{{route('bus.store')}}" autocomplete="FALSE" enctype='multipart/form-data'>
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
                      <label for="validationCustom01">Bus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticName" name="bus" placeholder="Please enter the bus name " value="{{ old('bus', request('bus')) }}">

                        @error('bus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </td>
                <td>
                    <u>Select Routes</u>
                    <select name="destname" class="form-select" aria-label="Default select example">
                        <option selected>select a destination</option>
                        @foreach($destname as $destname1)
                        <option></option>
                        <option value="{{$destname1->id}}">{{ $destname1->route_name }}</option>
                        @endforeach
                      </select>
                    



                <td>
                <td> 
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                      <label for="validationCustom01">Number os seates</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control-plaintext" id="staticName" name="numberse" placeholder="Please enter the bus name " value="{{ old('numberse', request('numberse')) }}">

                        @error('bus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    

                </td>
               <td>
                <button class="btn btn-primary" type="submit">Submit</button>
               </td>
                 
                </form>
                </td>
            </tr>
        </tbody>
</div>
@endsection
