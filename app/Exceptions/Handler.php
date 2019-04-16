<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'Symfony\Component\HttpKernel\Exception\HttpException',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
        //     return response()->json(['session_expired' => 'Lo siento, su sesión  ha expirado.']);
        //     // return redirect('/')->withErrors(['token_error' => 'Sorry, your session seems to have expired. Please try again.']);
        // }
        // if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
        //         // return response()->json([
        //         //     'session_expired' => $exception-,
        //         // ]);
        //     return parent::render($request, $exception);

        //     // return $exception->getMessage();
        // }

        // return parent::render($request, $exception);

        if ($this->isHttpException($e))
        {
            return $this->renderHttpException($e);
        }
        else if ($e instanceof \Illuminate\Session\TokenMismatchException)
        {
            if ($request->ajax()) {
                return response()->json([
                    'session_message' => 'Lo siento, su sesión  ha expirado.',
                    'session_expired' => true
                ]);
            }
        }
        else
        {
            return parent::render($request, $e);
        }

    }
}
