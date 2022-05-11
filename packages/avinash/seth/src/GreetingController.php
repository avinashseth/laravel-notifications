<?php

namespace Avinash\Seth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Avinash\Seth\Greeting;

class GreetingController extends Controller
{
    function addNewGreeting()
    {
        $greeting = new Greeting;
        $greeting->greet_key = 'say_hi';
        $greeting->greet_value = 'Hey, how are you doing?';
        $greeting->save();
    }
    function viewGreeting()
    {
        $greeting = Greeting::select('greet_value')
            ->where('greet_key', 'say_hi')
            ->first();
        return view('seth::view-greeting', compact('greeting'));
    }
}
