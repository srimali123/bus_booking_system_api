<?php

namespace App\Http\Controllers;

use App\Models\super_admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource as super_adminResource;


class super_adminController extends Controller
{
    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'password' => 'required|max:191',
        ]);
        $super_admin = new super_admin();
        $super_admin->name = $request->input('name');
        $super_admin->email = $request->input('email');
        $super_admin->password = $request->input('password');

        $super_admin->save();

        return response()->json(['message' => 'Admin Added Successfully'], 200);
        return new super_adminResource($super_admin);

    }

    /**
     * @param Request $request
     * @param $id
     * @return super_adminResource|\Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'password' => 'required|max:191',
        ]);
        $super_admin = super_admin::find($id);
        if ($super_admin) {
            $super_admin->name = $request->input('name');
            $super_admin->email = $request->input('email');
            $super_admin->password = $request->input('password');

            $super_admin->update();
            return response()->json(['message' => 'Admin Data Updated Successfully'], 200);
            return new super_adminResource($super_admin);
        }   else {
            return response()->json(['message' => 'No Record Found'], 404);
        }


    }


    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show(){

        $super_admin =super_admin::all();
        return super_adminResource::collection($super_admin);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function showId($id){

        $super_admin =super_admin::find($id);
        if($super_admin){
            return response()->json(['super_admin'=>$super_admin],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 404);
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id){
        $super_admin =super_admin::find($id);
        if($super_admin){
            $super_admin->delete();
            return response()->json(['message'=>'Admin Deleted Succesfully'],200);
        }else{
            return response()->json(['message'=>'No Record Found'], 400);
        }

    }

}
