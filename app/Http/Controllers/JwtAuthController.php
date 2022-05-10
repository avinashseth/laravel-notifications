<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;


class JwtAuthController extends Controller
{
    private $key = "asdfsdf";

    function __construct() {

        \Config::set('session.driver', 'array');

    }

    function postUserLogin(Request $request) {

        $user = User::where(['email'=>$request->email])->first();

        if($user) {
        
            if(Hash::check($request->password, $user->password)) {

                $token = $this->__create_token($user->id);

                return response()->json(['status'=>true,'message'=>'User Found','token'=>$token]);

            } else {

                return response()->json(['status'=>false,'message'=>'Invalid credentials']);

            }

        } else {

            return response()->json(['status'=>false,'message'=>'Invalid credentials']);

        }

    }

    function __verifyToken($token) {

        $json_data = ['status'=>false,'message'=>'Invalid request'];

        $return_json = ['status'=>false,'message'=>'Invalid request, please try again'];

        try
        {
            $jwt_decoded = JWT::decode($token, $this->key, array('HS256'));
            $return_json = ['status'=>true,'message'=>$jwt_decoded];
        }
        catch (\Exception $e) { }

        return $return_json;

    }

    function __create_token($user_id = null) {
        $payload = array(
            "iss" => "http://localhost:8000/",
            "aud" => "http://localhost:8000/",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "user_id" => $user_id,
        );
        $jwt = JWT::encode($payload, $this->key, 'HS256');
        return $jwt;
    }
    function postGetMyDetails(Request $request) {

        $json_data = $this->__verifyToken($request->token);

        return response()->json($json_data);

    }
}
