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
    
    <form method="POST" action="{{route('bus.update',$dests->id)}}" autocomplete="FALSE" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
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
                      <label for="validationCustom01">Bus name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticName" name="bus" placeholder="Start loction - End location " value="{{ old('bus', $dests->name) }}">
                        {{-- <input type="text" class="form-control-plaintext" id="staticName" name="destination" placeholder="Enter destination" value="{{ old('destination',$dests->destination_name) }}"> --}}
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
                      <label for="validationCustom01">Number os seates</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control-plaintext" id="staticName" name="numberse" placeholder="Please enter the bus name " value="{{ old('numberse',$dests->available_seats ) }}">

                        @error('bus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    

                </td>
                <td>

                    <u>Select destination</u>
                    
                      <select name="destname" class="form-select" aria-label="Default select example">
                        {{-- <option >{{$dests->id}}</option> --}}
                        <?php
                        foreach($destname as $destname1)
                       {
                        if($destname1->id == $dests->route_id)
                        {
                           
                            $selected = 'selected';
                        }
                        else
                        {
                          
                            $selected = "";
                        }
                        ?>
                        <option <?php echo $selected; ?> value="{{$destname1->id}}">{{ $destname1->route_name }}</option>
                        <?php } ?>                
                    </select>
                <td>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
                </td>
            </tr>
        </tbody>
</div>
@endsection
