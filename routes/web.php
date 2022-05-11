<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    $response = Http::get('https://mocki.io/v1/d4867d8b-b5d5-4a48-a4ab-79131b5809b8');
    dd($response->headers());
});

Route::post('/test', function(Request $request) {
    echo json_encode([
        'status'    =>  rand(0,1),
        'no_of_messages'    =>  rand(50,100),
        'name'  =>  $request->name
    ]);
});

Route::get('/http-post', function () {
    // $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
    //     'title' => 'foo',
    //     'body' => 'bar',
    //     'userId' => 1,
    // ]);
    $response = Http::post('http://localhost:8000/test', ['name'=>'avinash']);
    echo $response->body();
});
