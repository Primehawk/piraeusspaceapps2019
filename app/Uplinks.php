<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Uplinks extends Model
{

    public static function create($request)
    {
        //todo Add data validation

        $Uplink = new Uplinks();
        $Uplink->node_id = $request->input('node_id');
        $Uplink->h2 = $request->input('h2');
        $Uplink->lgp = $request->input('lgp');
        $Uplink->ch4 = $request->input('ch4');
        $Uplink->alcohol = $request->input('alcohol');
        $Uplink->air = $request->input('air');
        $Uplink->o3 = $request->input('o3');
        $Uplink->no2 = $request->input('no2');
        $Uplink->so2 = $request->input('so2');
        $Uplink->co = $request->input('co');
        $Uplink->temp = $request->input('temp');
        $Uplink->aqi = $request->input('aqi');
        $Uplink->battery = $request->input('battery');
        $Uplink->created_at = now();
        $Uplink->captured_at =  now(); //todo temp value for demo. replace with -> $request->input('captured_at');

        if ($Uplink->save()) {
            return response($Uplink->id, 201)->header('Content-Type', 'text/plain');
        } else {
            return response('Internal Server error, please try again in a few minutes', 400)->header('Content-Type', 'text/plain');
        }
    }

    public static function remove($request)
    {
        $Uplink = \Uplinks::where('id', $request->Input('id'))->where('owner_id', Auth::user()->id)->first();

        if ($Uplink->delete()) {
            return response('Uplink Removed', 200)->header('Content-Type', 'text/plain');
        } else {
            return response('Internal Server error, please try again in a few minutes', 400)->header('Content-Type', 'text/plain');
        }
    }

}
