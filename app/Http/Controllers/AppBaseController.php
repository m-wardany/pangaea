<?php

namespace App\Http\Controllers;

use Response;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
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
