<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
        });
    }

    /**
     * @param $request
     * @param Throwable $e
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Throwable $e): \Illuminate\Http\JsonResponse
    {
        $error = $this->convertExceptionToResponse($e);
        $statusCode = $error->getStatusCode();
        $response = [
            'code' => $statusCode,
            'message' => 'Server Error'
        ];
        if (config('app.debug')){
            $response['msg'] = $e->getMessage()??$e->getMessage();
            $response['file'] = $e->getFile()??$e->getFile();
            $response['line'] = $e->getLine()??$e->getLine();
            $response['trace'] = $e->getTrace()??$e->getTrace();;
        }
        return response()->json($response,$statusCode);
    }
}
