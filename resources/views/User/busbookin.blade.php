@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
      
        <form method="POST" action="{{route('booking.update',$value)}}" autocomplete="FALSE" enctype='multipart/form-data'>
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
                            <label for="validationCustom01">Name of the student</label>
                    </td>
                        <td>
                            <input type="text" class="form-control-plaintext" id="staticName" name="name"  placeholder="Enter destination" value="{{ old('name', request('name'))}}">
                        <td>
                    <td> 
                        <div class="form-row">
                            <label for="validationCustom01">Avalable seates</label>
                    </td>
                        <td>
                            <input type="text" class="form-control-plaintext" id="staticName" name="availableseate" readonly placeholder="Enter destination" value="{{$value,request('availableseate')}}">
                        <td>
                            <td> 
                                <div class="form-row">
                                    <label for="validationCustom01">Bus Name</label>
                            </td>
                                <td>
                                    <input type="text" class="form-control-plaintext" id="staticName" name="busname" readonly placeholder="Enter destination" value="{{$bus->name,request('busname')}}">
                                <td>
                            <td> 
                                <div class="form-row">
                                    <label for="validationCustom01">Booking seates</label>
                            </td>
                                <td>
                                    <input type="text" class="form-control-plaintext" id="staticName" name="bookingse" readonly placeholder="" value="1{{request('bookingse')}}">
                                <td>
                                   @if ('bookingse'<=$value)
                                   
                                   @else
                                   alert("please enter a value lesss than the avalable seates");
                                   @endif
                                   <button class="btn btn-primary" type="submit">Submit</button>
                       
                        {{-- <a class="btn btn-outline-warning rounded-pill" href="{{ Route('user.store')}}">Save</a></th> --}}
                    </form>

</div>

@endsection