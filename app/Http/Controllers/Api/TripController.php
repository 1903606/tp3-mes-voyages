<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;


class TripController extends Controller
{

    public function apropos()
    {
        return view('apropos');
    }
    public function index()
    {
        $trips = Trip::orderby('id', 'desc')->get();

        return response()->json($trips);
    }

    public function store(Request $request)
    {

        $trips = Trip::create($request->all());

        return response()->json([
            'status' => 'success',
            'trip'   => $trips
        ]);
    }

    public function show($id)
    {
        $trips = Trip::find($id);

        return response()->json($trips);
    }

    public function update(Request $request, $id)
    {
        $trips = Trip::find($id);
        $trips->update($request->all());

        return response()->json([
            'status' => 'success',
            'post'   => $trips
        ]);
    }

    public function destroy($id)
     {
        $trips = Trip::find($id);
        $trips->delete();

         return response()->json('Product successfully deleted!');
     }

     public function autocomplete(Request $request){
        $data = Trip:: select('name as value', 'id')
        ->where('name', 'LIKE', '%'. $request->get('search'). '%')
        ->get();
        return response()->json($data);
     }
}
