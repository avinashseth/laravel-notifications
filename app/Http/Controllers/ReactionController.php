<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Notifications\SendMoneyNotification;
use App\Models\User;
use Notification;

class ReactionController extends Controller
{
    public function sendMoneyNotification()
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data['message'] = 'Your account credited with $' . rand(100,999);
        $details = [
            'user_id' => 101,
            'message' => $data['message'],
            'notification_url'  =>  'http://localhost:8000/notify/105',
        ];
        $user = User::first();
        Notification::send($user, new SendMoneyNotification($details));
        $pusher->trigger('send-money', 'App\\Events\\SendMoneyEvent', $data);
    }
}
