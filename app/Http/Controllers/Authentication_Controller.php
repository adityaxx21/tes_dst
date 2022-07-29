<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class Authentication_Controller extends Controller
{
   public function register(Request $request)
   {
    $request->validate([
        'email' => 'required|unique:users',
        'password' => 'required',
        'name' => 'required',

    ]);

    $sav_date = date('Y-m-d H:i:s');
    $email = $request->email;
    $password = md5($request->password);
    $name = $request->name;
    $api_token = Str::random(80);

    $get_data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'api_token' => $api_token
    ];
    DB::table('users')->insert($get_data);
   }

   public function login(Request $request)
   {
    
   }
}
