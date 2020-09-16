@extends('layouts.app')
    @section('content')
        <div class="container">
                
            <h1>Create Units</h1>
            {!!Form::open(['action' => ['App\Http\Controllers\CarsController@store'], 'method' => 'POST','enctype'=>'multipart/form-data'])!!}
                <div class="form-group">
                    {{Form::label('name', 'Car Brand')}}
                    {{Form::text('name', '',['class'=> 'form-control', 'placeholder' => 'Car Brand'])}}
                </div>
                <div class="form-group">
                    {{Form::label('code', 'Unit CODE')}}
                    {{Form::text('code', '',['class'=> 'form-control', 'placeholder' => 'Code'])}}
                </div>
                <div class="form-group">
                    {{Form::label('capacity', 'Capacity')}}
                    {{Form::text('capacity', '',['class'=> 'form-control', 'placeholder' => 'Capacity'])}}
                </div>
                <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{Form::text('price', '',['class'=> 'form-control', 'placeholder' => 'Price'])}}
                </div>
                    <div>
                        {{Form::label('cover_image', 'Image')}}
                    </div>
                    <div>
                        {{Form::file('cover_image')}}
                    </div>
                    
                 
                <div class="mt-4">
                    {{Form::submit('Submit', ['class' => 'btn btn-outline-primary'])}}
                </div>
            {!!Form::close()!!}
        </div>
    @endsection