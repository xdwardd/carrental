@extends('layouts.app')

@section('content')
<h1>Reservation</h1>

@if (!Auth::guest())
<div class="row">

    @if (count($reservations) > 0)
    @foreach ($reservations as $reservation)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm" style="width: 18rem:">
            <div class="card-body">
                <p class="card-text">{{$reservation->fullname}}</p>
                <p class="card-text">{{$reservation->address}}</p>
                <p class="card-text">{{$reservation->contact}}</p>
                <p class="card-text">{{$reservation->date}}</p>
                <p class="card-text">{{$reservation->code}}</p>
                <p class="card-text">{{$reservation->days}}</p>
               <small>Created at: {{$reservation->created_at}}</small>

            </div>
                
                {!!Form::open(['action' => ['App\Http\Controllers\ReservationController@destroy', $reservation->id], 'method'=> 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('CONFIRM', ['class' => 'btn btn-sm btn-success rounded-0', 'style' => 'width:100%'])}}
                {!!Form::close()!!}

                 
           
           
        </div>
    </div>
@endforeach
    @else
        <p>No Reservation</p>
        
    @endif
    
@endif


@endsection

