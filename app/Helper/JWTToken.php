<?php
namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken {

   public static function CreateToken($userEmail,$userId,$role):string {
    $key = env('JWT_KEY');
    
    $payload =[
        //token issuer name
        'iss' => 'laravel-token',

        //token creation time
        'iat' => time(),

        //token expair time
        'exp'=> time()+60*60*30,
        //zar jonno token issu korbo tar mail
        'userEmail' => $userEmail,
        'userID' => $userId,
        'role' => $role
   
    ];
      return JWT::encode($payload,$key,'HS256');
    }
    
   public static function VerifyToken($token):string|object {
    try{
      $key = env('JWT_KEY');
      $decode = JWT::decode($token,new Key($key,'HS256'));
      return $decode;

    }catch(Exception $e) {
      return 'unauthorized';
    }
  }


}