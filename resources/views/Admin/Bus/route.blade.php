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
            <th><h1>Destination list&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1></th>
           <!--   <th>&nbsp;&nbsp;&nbsp;<a class="btn btn-outline-success rounded-pill" href="">Create</a></th>
       --> 
       <th><a class="btn btn-outline-warning rounded-pill" href="{{Route('bus.create')}}">Add a new</a></th> </th>
    </thead>
    </table>
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Bus</th>
                <th>Routes</th>
                <th colspan="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Available seats
                </th>
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
                <td>{{ $dest->name }}</td>
                <td>{{ $dest->routes->route_name}}</td>
                <td>{{ $dest->available_seats}} </td>
                <td>
                    <a class="btn btn-outline-warning rounded-pill" href="{{Route('bus.edit',$dest->id)}}">Edit</a></th>
                </td>
                <td>
                    <form class="deleteGroup" action="{{Route('bus.destroy',$dest->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="delete-button" type="submit" title="Delete Company" class="btn btn-danger ml-1 btn-outline rounded-pill ">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    {{ $dests->links() }}
</div>
@endsection
