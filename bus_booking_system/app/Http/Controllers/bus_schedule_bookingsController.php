<?php

namespace App\Http\Controllers;

use App\Http\Resources\bus_schedule_bookingsResource;
use App\Models\bus_schedule_bookings;
use Illuminate\Http\Request;

class bus_schedule_bookingsController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([


            'bus_seate_id'=>'required|max:191',
            'user_id'=>'required|max:191',
            'bus_schedule_id'=>'required|max:191',
            'seat_number'=>'required|max:191',
            'price'=>'required|max:191',
            'status'=>'required|max:191',



        ]);

        $bus_schedule_bookings = new bus_schedule_bookings;

        $bus_schedule_bookings->bus_seate_id = $request->input('bus_seate_id');
        $bus_schedule_bookings->user_id = $request->input('user_id');
        $bus_schedule_bookings->bus_schedule_id = $request->input('bus_schedule_id');
        $bus_schedule_bookings->seat_number = $request->input('seat_number');
        $bus_schedule_bookings->price = $request->input('price');
        $bus_schedule_bookings->status = $request->input('status');





        $bus_schedule_bookings->save();

        return response()->json(['message' => ' Bus Schedules Booking Details Added Successfully'], 200);
        return new bus_schedule_bookingsResource($bus_schedule_bookings);

    }


    public function show(){

        $bus_schedule_bookings = bus_schedule_bookings::all();
        return bus_schedule_bookingsResource::collection($bus_schedule_bookings);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'bus_seate_id'=>'required|max:191',
            'user_id'=>'required|max:191',
            'bus_schedule_id'=>'required|max:191',
            'seat_number'=>'required|max:191',
            'price'=>'required|max:191',
            'status'=>'required|max:191',



        ]);
        $bus_schedule_bookings = bus_schedule_bookings::find($id);
        if ($bus_schedule_bookings) {
            $bus_schedule_bookings->bus_route_id = $request->input('bus_route_id');
            $bus_schedule_bookings->direction = $request->input('direction');
            $bus_schedule_bookings->start_timestamp= $request->input('start_timestamp');
            $bus_schedule_bookings->end_timestamp= $request->input('end_timestamp');



            $bus_schedule_bookings->update();
            return response()->json(['message' => ' Bus Schedules Bookings Data Updated Successfully'], 200);
            return new bus_schedule_bookingsResource($bus_schedule_bookings);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showId($id){

        $bus_schedule_bookings =bus_schedule_bookings::find($id);
        if($bus_schedule_bookings){
            return response()->json(['bus_schedule_bookings'=>$bus_schedule_bookings],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $bus_schedule_bookings =bus_schedule_bookings::find($id);
        if($bus_schedule_bookings){
            $bus_schedule_bookings->delete();
            return response()->json(['message'=>' Bus  Schedules  Booking Details  Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }
}
