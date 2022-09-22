@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      
        <form method="POST" action="{{route('booking.store')}}" autocomplete="FALSE" enctype='multipart/form-data'>
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
                    </td>
                        <td>
                            <u>Select Routes</u>
                            <select name="destname" class="form-select" aria-label="Default select example">
                                <option selected>select a destination</option>
                                @foreach($bus as $buss)
                                <option value="{{$buss->id}}">Bus name :{{ $buss->name }}: Route name :{{$buss->routes->route_name}}</option>
                                @endforeach
                              </select>        
                        <td>
                    
                        <button class="btn btn-primary" type="submit">Submit</button>
                        {{-- <a class="btn btn-outline-warning rounded-pill" href="{{ Route('user.store')}}">Save</a></th> --}}
                    </form>

</div>

@endsection