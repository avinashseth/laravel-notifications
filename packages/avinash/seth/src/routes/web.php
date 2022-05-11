<?php

    // namespace Avinash\Seth;

    use Avinash\Seth\GreetingController;

    Route::get('create-greeting', [GreetingController::class, 'addNewGreeting']);
    Route::get('view-greeting', [GreetingController::class, 'viewGreeting']);