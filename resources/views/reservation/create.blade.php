@extends('layouts.app')
    @section('content')
        <div class="container">
                
            <h1>Make Reservation</h1>
            {!!Form::open(['action' => ['App\Http\Controllers\ReservationController@store'], 'method' => 'POST','enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {{Form::label('fullname', 'Fullname')}}
                    {{Form::text('fullname', '',['class'=> 'form-control', 'placeholder' => 'Fullname'])}}
                </div>
                <div class="form-group">
                    {{Form::label('address', 'Address')}}
                    {{Form::text('address', '',['class'=> 'form-control', 'placeholder' => 'City/Muncipality - Barangay - Purok/Street'])}}
                </div>
                <div class="form-group">
                    {{Form::label('contact', 'Contact')}}
                    {{Form::text('contact', '',['class'=> 'form-control', 'placeholder' => 'Email / Phone no.'])}}
                </div>
                <div class="form-group">
                    {{Form::label('date', 'Reservation Date')}}
                    {{Form::text('date', '',['class'=> 'form-control', 'placeholder' => ' mm/dd/yy'])}}
                </div>
                <div class="form-group">
                    {{Form::label('code', 'Unit Code')}}
                    {{Form::text('code', '',['class'=> 'form-control', 'placeholder' => ' BC-0453'])}}
                </div>
                <div class="form-group">
                    {{Form::label('days', 'No. of Days')}}
                    {{Form::text('days', '',['class'=> 'form-control', 'placeholder' => 'No of days'])}}
                </div>
                 
                <div class="mt-4">
                    {{Form::submit('Submit Reservation', ['class' => 'btn btn-success'])}}
                </div>
            {!!Form::close()!!}
        </div>
    @endsection