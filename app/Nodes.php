<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Nodes extends Model
{

    protected $appends = ['aqi'];

    public function getAqiAttribute()
    {
        //Return Latest Aqi Measurement
        $LatestUplink = Uplinks::where('node_id',$this->getAttribute('id'))->orderBy('captured_at')->first();
        // $Data['aqi'] = $LatestUplink->aqi;
        // $Data['captured_at'] = $LatestUplink->captured_at;
        //return $Data;
        if ($LatestUplink){
            return $LatestUplink->aqi;
        }else {
            return false;
        }


    }

    public static function create($request)
    {
        //todo Add data validation
        $Node = new Nodes;
        $Node->name = $request->input('name');
        $Node->Owner_id = Auth::user()->id;
        $Node->longitude = $_Longtitude = $request->input('longitude');
        $Node->latitude = $request->input('latitude');
        $Node->created_at = now();
        $Node->updated_at = now();

        if ($Node->save()) {
            return response($Node->id, 201)->header('Content-Type', 'text/plain');
        } else {
            return response('Internal Server error, please try again in a few minutes', 400)->header('Content-Type', 'text/plain');
        }
    }

    public static function remove($request)
    {
        //todo Remove all uplinks associated with that node
        $Node = Nodes::where('owner_id', Auth::user()->id)->where('id', $request->Input(['id']))->first();

        if ($Node->delete()){
            return response('Node Removed', 200)->header('Content-Type', 'text/plain');
        }else {
            return response('Internal Server error, please try again in a few minutes', 400)->header('Content-Type', 'text/plain');
        }
    }

    public static function modify($request)
    {
    }
}
