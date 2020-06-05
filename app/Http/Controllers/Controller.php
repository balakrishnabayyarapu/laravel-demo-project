<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success($message,$statusCode=200)
    {
    	return response()->json([
    								'message'=> $message,
    								'status' => "success"
    							],
                                $statusCode);
    }
    public function error($message, $statusCode=401)
    {
    	return response()->json([
    								'message'=>$message,
    								'status' => "error"
    							],$statusCode);
    }
}
