<?php

namespace App\Http\Controllers;

use App\Http\Resources\bus_detailResource;
use App\Models\bus_detail;
use Illuminate\Http\Request;

class bus_detailController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([


            'name'=>'required|max:191',
            'type'=>'required|max:191',
            'vehical_number'=>'required|max:191',



        ]);

        $bus_detail = new bus_detail;

        $bus_detail->name = $request->input('name');
        $bus_detail->type = $request->input('type');
        $bus_detail->vehical_number = $request->input('vehical_number');




        $bus_detail->save();

        return response()->json(['message' => ' bus  details Added Successfully'], 200);
        return new bus_detailResource($bus_detail);

    }


    public function show(){

        $bus_detail = bus_detail::all();
        return bus_detailResource::collection($bus_detail);
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'name'=>'required|max:191',
            'type'=>'required|max:191',
            'vehical_number'=>'required|max:191',

        ]);
        $bus_detail = bus_detail::find($id);
        if ($bus_detail) {
            $bus_detail->name = $request->input('name');
            $bus_detail->type = $request->input('type');
            $bus_detail->vehical_number= $request->input('vehical_number');



            $bus_detail->update();
            return response()->json(['message' => ' Bus Detail Data Updated Successfully'], 200);
            return new bus_detailResource($bus_detail);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showId($id){

        $bus_detail =bus_detail::find($id);
        if($bus_detail){
            return response()->json(['bus_detail'=>$bus_detail],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $bus_detail =bus_detail::find($id);
        if($bus_detail){
            $bus_detail->delete();
            return response()->json(['message'=>' Bus Details  Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }
}
