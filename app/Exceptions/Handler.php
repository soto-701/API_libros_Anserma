<?php

namespace App\Exceptions;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
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
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
     public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Exception) {
            Log::error($exception->getMessage() . ' line: ' . $exception->getLine() . ' file: ' . $exception->getFile());
             return response()->json([
                'success' => false,
                'message' => trans ( 'messages.global_errors_internal_server_error'),
                'info' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                  ] ,Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        return parent ::render ($request, $exception);
    }
}