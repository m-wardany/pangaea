<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function sendResponse($data=[], $message = null, $code = 200)
    {
        return Response::json([
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    public function sendError($error, $code = 404)
    {
        return Response::json([
            'message'    => is_string($error) ? $error : $error[key($error)],
            'extra_data' => '',
            'errors'     => is_string($error) ? '' : $error,
            'code'       => strval($code),
        ], $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'message' => $message,
        ], 200);
    }
}
