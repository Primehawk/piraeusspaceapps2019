<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Events\Notify;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', function () {
    $Nodes = \App\Nodes::where('owner_id', Auth::user()->id)->get();
    return view('Dashboard')->with('_Nodes', $Nodes);
})->name('HomePage')->middleware('auth');

Route::get('/Dashboard', function () {
    $Nodes = \App\Nodes::where('owner_id', Auth::user()->id)->get();
    return view('Dashboard')->with('_Nodes', $Nodes);
})->name('Dashboard')->middleware('auth');

Route::get('/Nodes', function (request $request) {
    $Nodes = \App\Nodes::where('owner_id', Auth::user()->id)->get();
    if ($request->ajax()) {
        $Data['data'] = $Nodes;
        return response()->json($Data);
    } else {
        return view('Nodes')->with('_Nodes', $Nodes);
    }

})->name('Nodes')->middleware('auth');

Route::get('Nodes/{id}', function ($id, request $request) {
    $Node = \App\Nodes::where('owner_id', Auth::user()->id)->where('id', $id)->first();
    $Uplinks = \App\Uplinks::where('node_id', $Node->id)->get();
    if ($request->ajax()) {
        $Data['data'] = $Node;
        return response()->json($Data);
    } else {
        return view('Node')->with('_Node', $Node)->with('_Uplinks', $Uplinks);
    }
})->middleware('auth');

Route::get('Uplinks/', function ( request $request) {
   /*
    //todo return all node uplinks
    $Node = \App\Nodes::where('owner_id', Auth::user()->id)->first();
    $Uplinks = \App\Uplinks::where('node_id', $Node->id)->get();
    $Data['data'] = $Node;
    return response()->json($Data);
   */


})->middleware('auth')->name('Uplinks');

Route::get('Uplinks/{id}', function ($id, request $request) {
    $Node = \App\Nodes::where('owner_id', Auth::user()->id)->where('id', $id)->first();
    $Uplinks = \App\Uplinks::where('node_id', $Node->id)->get();
    $Data['data'] = $Uplinks;
    return response()->json($Data);
})->middleware('auth');


//Todo Demo Only remove afterwards
Route::post('DemoUplinks', function (request $request) {
    //return "ok";
    $data = json_decode($request->getContent(), true);


    $request = new \Illuminate\Http\Request();

    $request->merge([
        'h2' => $data['h2'],
        'node_id' => 55,
        'lgp' => 10,
        'ch4' => $data['ch4'],
        'alcohol' => $data['alcohol'],
        'air'=> $data['air'],
        'o3' => $data['o3'],
        'no2' => $data['no2'],
        'so2' => $data['so2'],
        'co' => $data['co'],
        'temp' => $data['temp'],
        'aqi' => $data['aqi'],
        'battery' => $data['battery'],
        'created_at' => now(),
        'captured_at' => now()
    ]);
   // \App\Events\Notify('hello world');
    return \App\Uplinks::create($request);
})->middleware('web');

Auth::routes();
