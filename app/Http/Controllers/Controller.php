<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function sendResponse($data,$message='Action successfully performed',$code=200)
    {
        $response = [
            'success'=>true,
            'message'=>$message,
            'data'=>$data
        ];
        return response()->json($response,$code);
    }

    public static function sendError($errors=[],$message="Error ocurred",$code=400)
    {
        $response = [
            'success'=>false,
            'message'=>$message,
            'errors'=>$errors,
        ];
        return response()->json($response,$code);
    }
}
