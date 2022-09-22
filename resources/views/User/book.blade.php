@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ url('booking') }}" method="get">
                <input type="text" name="search" id="search" value="{{ old('search', request('search')) }}">
                <input class="btn btn-outline-warning rounded-pill" type="submit" value="Search">
            </form>
        </div>
    </div>

    <br>
     <table>
        <thead>
            <th><h1>Destination list</h1></th>
       <th> 
    </thead>
    </table>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Destinations</th>
                <th>Fee</th>
                <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Action
                </th>
            <!--  <th>Edit</th>
                <th>Delete</th>
            -->
            </tr>
        </thead>
        <tbody>
            @foreach($dests as $dest)
            <tr>
                <td>{{ $dest->destination_name }}</td>
                <td>{{ $dest->Fee_per_month}}</td>
                <td>
                    <a class="btn btn-outline-warning rounded-pill" href="{{route('booking.show',$dest->id)}}">Book</a></th>
                    {{-- <a class="btn btn-outline-warning rounded-pill" href="{{Route('booking.edit',$dest->id)}}">Edit</a></th> --}}
                </td>
              
            </tr>
        </tbody>
        @endforeach
    </table>
    {{ $dests->withQueryString()->render()  }}
    
</div>

@endsection
