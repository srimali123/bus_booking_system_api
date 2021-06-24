<?php

namespace App\Http\Controllers;

use App\Models\bus_routes;
use App\Models\bus_routes as bus_routesResource;
use Illuminate\Http\Request;

class bus_routesController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'bus_id' => 'required|max:191',
            'route_id' => 'required|max:191',
            'status' => 'required|max:191',

        ]);

        $bus_routes = new bus_routes;

        $bus_routes->bus_id = $request->input('bus_id');
        $bus_routes->route_id = $request->input('route_id');
        $bus_routes->status = $request->input('status');




        $bus_routes->save();

        return response()->json(['message' => ' bus routes details Added Successfully'], 200);
        return new bus_routesResource($bus_routes);

    }

    /**
     * @return bus_routesResource[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show(){

        $bus_routes = bus_routes::all();
        return bus_routesResource::collection($bus_routes);
    }

    /**
     * @param Request $request
     * @param $id
     * @return bus_routesResource|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_id' => 'required|max:191',
            'route_id' => 'required|max:191',
            'status' => 'required|max:191',

        ]);
        $bus_routes = bus_routes::find($id);
        if ($bus_routes) {
            $bus_routes->bus_id = $request->input('bus_id');
            $bus_routes->route_id = $request->input('route_id');
            $bus_routes->status = $request->input('status');



            $bus_routes->update();
            return response()->json(['message' => ' Bus Routes Data Updated Successfully'], 200);
            return new bus_routesResource($bus_routes);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showId($id){

        $bus_routes =bus_routes::find($id);
        if($bus_routes){
            return response()->json(['bus_routes'=>$bus_routes],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $bus_routes =bus_routes::find($id);
        if($bus_routes){
            $bus_routes->delete();
            return response()->json(['message'=>' Bus Routes Detail Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }






}
