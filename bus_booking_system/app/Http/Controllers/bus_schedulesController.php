<?php

namespace App\Http\Controllers;

use App\Http\Resources\bus_schedulesResource;
use App\Models\bus_schedules;
use Illuminate\Http\Request;

class bus_schedulesController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([


            'bus_route_id'=>'required|max:191',
            'direction'=>'required|max:191',
            'start_timestamp'=>'required|max:191',
            'end_timestamp'=>'required|max:191',



        ]);

        $bus_schedules = new bus_schedules;

        $bus_schedules->bus_route_id = $request->input('bus_route_id');
        $bus_schedules->direction = $request->input('direction');
        $bus_schedules->start_timestamp = $request->input('start_timestamp');
        $bus_schedules->end_timestamp = $request->input('end_timestamp');




        $bus_schedules->save();

        return response()->json(['message' => ' Bus Schedules details Added Successfully'], 200);
        return new bus_schedulesResource($bus_schedules);

    }


    public function show(){

        $bus_schedules = bus_schedules::all();
        return bus_schedulesResource::collection($bus_schedules);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'bus_route_id'=>'required|max:191',
            'direction'=>'required|max:191',
            'start_timestamp'=>'required|max:191',
            'end_timestamp'=>'required|max:191',



        ]);
        $bus_schedules = bus_schedules::find($id);
        if ($bus_schedules) {
            $bus_schedules->bus_route_id = $request->input('bus_route_id');
            $bus_schedules->direction = $request->input('direction');
            $bus_schedules->start_timestamp= $request->input('start_timestamp');
            $bus_schedules->end_timestamp= $request->input('end_timestamp');



            $bus_schedules->update();
            return response()->json(['message' => ' Bus Schedules Data Updated Successfully'], 200);
            return new bus_schedulesResource($bus_schedules);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showId($id){

        $bus_schedules =bus_schedules::find($id);
        if($bus_schedules){
            return response()->json(['bus_schedules'=>$bus_schedules],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $bus_schedules =bus_schedules::find($id);
        if($bus_schedules){
            $bus_schedules->delete();
            return response()->json(['message'=>' Bus  Schedules Details  Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }
}
