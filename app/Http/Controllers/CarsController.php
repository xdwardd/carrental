<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cars;

class CarsController extends Controller
{

      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $car = Cars::orderBy('created_at', 'desc')->get();
        return view('cars.index')->with('cars', $car);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
                'name' => 'required',
                'code'=> 'required',
                'capacity' => 'required',
                'price' => 'required',
                'cover_image' => 'image|nullable|max:1999'
        ]);

            //Handle file upload
            
            if ($request->hasFile('cover_image')) {
                //get filename and extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get EXTENSION
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                //upload file
                $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
            } else {
                $filenameToStore = 'noimg.jpg';
            }
            
        //create

        $car = new Cars;
        $car->name = $request->input('name');
        $car->code = $request->input('code');
        $car->capacity = $request->input('capacity');
        $car->price = $request->input('price');
        $car->cover_image = $filenameToStore;
        $car->user_id = auth()->user()->id;

        $car->save();

        return redirect('cars')->with('success','New Units Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $car = Cars::find($id);
        return view('cars.edit')->with('car',$car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'name' => 'required',
            'code'=> 'required',
            'capacity' => 'required',
            'price' => 'required'

        ]);
        if ($request->hasFile('cover_image')) {
            //get filename and extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get EXTENSION
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            //upload file
            $path = $request->file('cover_image')->storeAs('public/cover_images',$filenameToStore);
        }
        
        $car = Cars::find($id);
        $car->name = $request->input('name');
        $car->code = $request->input('code');
        $car->capacity = $request->input('capacity');
        $car->price = $request->input('price');
        if ($request->hasFile('cover_image')) {
            $car->cover_image = $filenameToStore;
        }

        $car->save();

        return redirect('cars')->with('success','Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $car = Cars::find($id);
        if ($car->cover_image != 'noimg.jpg') {
            Storage::delete('public/cover_images/'.$car->cover_image);
        }
            $car->delete();
            return redirect('cars')->with('success', 'Unit Removed');

        
    }
}
