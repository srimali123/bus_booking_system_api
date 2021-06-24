<?php

namespace App\Http\Controllers;

use App\Http\Resources\routes_table as routes_tableResource;
use App\Models\routes_table;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class RoutesTableController extends Controller
{
    /**
     * @param Request $request
     * @return routes_tableResource|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {


        $request->validate([
            'node_one' => 'required|max:191',
            'node_two' => 'required|max:191',
            'route_number' => 'required|max:191',
            'distance'=>'required|max:191',
            'time'=>'required|max:191',

        ]);

        $routes_table = new routes_table;

        $routes_table->node_one = $request->input('node_one');
        $routes_table->node_two = $request->input('node_two');
        $routes_table->route_number = $request->input('route_number');
        $routes_table->distance = $request->input('distance');
        $routes_table->time = $request->input('time');



        $routes_table->save();

        return response()->json(['message' => 'routes details Added Successfully'], 200);
        return new routes_tableResource($routes_table);

    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(){

        $routes_table =routes_table::all();
        return routes_tableResource::collection($routes_table);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'node_one' => 'required|max:191',
            'node_two' => 'required|max:191',
            'route_number' => 'required|max:191',
            'distance'=>'required|max:191',
            'time'=>'required|max:191',

        ]);
        $routes_table = routes_table::find($id);
        if ($routes_table) {
            $routes_table->node_one = $request->input('node-one');
            $routes_table->node_two = $request->input('node_two');
            $routes_table->route_number = $request->input('route_number');
            $routes_table->distance = $request->input('distance');
            $routes_table->time = $request->input('time');


            $routes_table->update();
            return response()->json(['message' => 'Routes Data Updated Successfully'], 200);
            return new routes_tableResource($routes_table);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }



    public function showId($id){

        $routes_table =routes_table::find($id);
        if($routes_table){
            return response()->json(['routes_table'=>$routes_table],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    public function destroy($id){
        $routes_table =routes_table::find($id);
        if($routes_table){
            $routes_table->delete();
            return response()->json(['message'=>'Routes Detail Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }





}
