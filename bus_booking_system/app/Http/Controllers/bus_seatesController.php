<?php

namespace App\Http\Controllers;

use App\Http\Resources\bus_seatesResource;
use App\Models\bus_seates;
use Illuminate\Http\Request;

class bus_seatesController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([


            'bus_id'=>'required|max:191',
            'seat_number'=>'required|max:191',
            'price'=>'required|max:191',



        ]);

        $bus_seates = new bus_seates;

        $bus_seates->bus_id = $request->input('bus_id');
        $bus_seates->seat_number = $request->input('seat_number');
        $bus_seates->price = $request->input('price');




        $bus_seates->save();

        return response()->json(['message' => ' bus seates details Added Successfully'], 200);
        return new bus_seatesResource($bus_seates);

    }


    public function show(){

        $bus_seates = bus_seates::all();
        return bus_seatesResource::collection($bus_seates);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'bus_id'=>'required|max:191',
            'seat_number'=>'required|max:191',
            'price'=>'required|max:191',


        ]);
        $bus_seates = bus_seates::find($id);
        if ($bus_seates) {
            $bus_seates->bus_id = $request->input('bus_id');
            $bus_seates->seat_number = $request->input('seat_number');
            $bus_seates->price= $request->input('price');



            $bus_seates->update();
            return response()->json(['message' => ' Bus Seates Data Updated Successfully'], 200);
            return new bus_seatesResource($bus_seates);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showId($id){

        $bus_seates =bus_seates::find($id);
        if($bus_seates){
            return response()->json(['bus_seates'=>$bus_seates],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $bus_seates =bus_seates::find($id);
        if($bus_seates){
            $bus_seates->delete();
            return response()->json(['message'=>' Bus  Seates Details  Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }
}
