<?php

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

Route::get('/', function () {

    $client = app('GuzzleClient')(['base_uri' => 'http://httpbin.org/']);

    $request = $client->get('get',[
        'query' => ['foo'=>'bar', 'baz' => 'baz2'] ,
        'headers' => [ 'accept' =>  'application/json']
    ]);
    $response = json_decode((string) $request->getBody());
    return response()->json($response);
//    return view('welcome');
});
