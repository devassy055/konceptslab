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
     <table>
        <thead>
            <th><h1>Destination list</h1></th>
           <!--   <th>&nbsp;&nbsp;&nbsp;<a class="btn btn-outline-success rounded-pill" href="">Create</a></th>
       --> 
    </thead>
    </table>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Name of the student</th>
                <th>Bus</th>
                <th colspan="2">No of seats</th>
            <!--  <th>Edit</th>
                <th>Delete</th>
            -->
            </tr>
        </thead>
        <tbody>
            @foreach($dests as $dest)
            <tr>
                <td>{{ $dest->name_student }}</td>
                <td>{{ $dest->bus->name}}</td>
                <td>{{ $dest->nooffsets}}</td>
                {{-- <td>
                    <a class="btn btn-outline-warning rounded-pill" href="{{Route('booking.edit',$dest->id)}}">Edit</a></th>
                </td>
                <td>
                    <form class="deleteGroup" action="{{Route('user.destroy',$dest->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="delete-button" type="submit" title="Delete Company" class="btn btn-danger ml-1 btn-outline rounded-pill ">
                            Delete
                        </button>
                    </form> --}}
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{ $dests->links() }}
</div>
@endsection
