<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param $data
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data, $code = 200)
    {
        $response = [
            'code' => $code,
            'result' => $data,
            'message' => 'success'
        ];
        return response()->json($response);
    }


    /**
     * @param $message
     * @param $code
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message = 'error', $code = 400 , $data = [])
    {
        $response = [
            'code' => $code,
            'result' => $data,
            'message' => $message
        ];
        return response()->json($response, $code);
    }
}
