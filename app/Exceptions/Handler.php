<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
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
        $this->renderable(function(Exception $e, $request) {
            return $this->handleException($request, $e);
        });
    }

     public function handleException($request, Exception $e)
     {
        if($e instanceof NotFoundHttpException) {
            return response()->json(['success' => false, 'error' => $e->getMessage(), 'code' => $e->getStatusCode()], $e->getStatusCode());
        }
        elseif($e instanceof MethodNotAllowedHttpException) {
            return response()->json(['success' => false, 'error' => $e->getMessage(), 'code' => $e->getStatusCode()], $e->getStatusCode());
        }
          
     }
}

