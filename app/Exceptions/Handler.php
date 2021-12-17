<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param Request $request
     * @param Throwable $e
     * @throws Throwable
     * @return JsonResponse|\Illuminate\Http\Response|Response
     */
    public function render($request, Throwable $e)
    {
        
        if ($e instanceof ValidationException) {
            return response()->json([
                'message'    => $e->getMessage(),
                'errors'     => $e->errors(),
            ], 422);
        } elseif ($e instanceof Exception && !($e instanceof ValidationException) && ($request->ajax() || $request->wantsJson())) {
            return response()->json([
                'message'    => $e->getMessage(),
                'extra_data' => '',
                'errors'     => '',
                'code'       => '',
            ], $e->getCode());
        }
        return parent::render($request, $e);
    }
}
