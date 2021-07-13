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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
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
    public function render($request, Exception $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            return redirect()->route('login')
            ->with('error', 'المستخدم ليس لديه الصلاحية للوصول إلى هذه الصفحة.');
        }
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            return redirect()
                   ->back()
                   ->with('error', 'انتهت صلاحية النموذج بسبب عدم النشاط. حاول مرة اخرى');
        }
        return parent::render($request, $exception);
    }
}
