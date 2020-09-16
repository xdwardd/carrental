@extends('layouts.app')
@section('content')
<section class="jumbotron text-center">
            
    <h1>Bogo Car Rental</h1>
    <p class="lead text-muted">Make travel adventure comfortable. Bogo Car Rental is at your service.</p>
   
  
</section>
<section>
        
                <div class="mb-4">
                        
                     <h1 class="text-center border-bottom" id="units">Available Units</h1>
                </div>
    
    


    @if (count($cars) > 0)

       
            <div class="row">
                    
                @foreach ($cars as $car)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm" style="width: 18rem:">
                            <img class="card-img-top" src="/storage/cover_images/{{$car->cover_image}}" alt="car1">
                            <div class="card-body">
                                <p class="card-text">Car Brand: {{$car->name}}</p>
                                <p class="card-text">Unit CODE: {{$car->code}}</p>
                                <p class="card-text">Capacity: {{$car->capacity}}</p>
                                <p class="card-text">Price: {{$car->price}}</p>
                            </div>
                            @if (!Auth::guest())
                                <div class="d-flex justify-content-between px-4 pb-4">
                                    <a class="btn btn-sm btn-outline-success" href="/cars/{{$car->id}}/edit">Edit</a>
                                {!!Form::open(['action' => ['App\Http\Controllers\CarsController@destroy', $car->id], 'method'=> 'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-danger'])}}
                                {!!Form::close()!!}

                                 </div>
                                
                            @endif
                            <div>
                                <a style="width: 100%" class="btn btn-success rounded-0" href="reservation/create">Make Reservation</a>
                            </div>

                        </div>
                    </div>
                @endforeach
                  
                    
            </div>
            
            
   
      

@endif



<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017-2020 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>



@endsection
