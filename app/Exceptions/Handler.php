<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Render custom API Respnse
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $e
     * @return mixed $retval
     */
    public function render($request, Throwable $e)
    {
        if ($request->wantsJson()) {
            return $this->handleApiException($request, $e);
        } else {
            $retval = parent::render($request, $e);
        }

        return $retval;
    }

    /**
     * Handle type of Error for API
     *
     * @param \Illuminate\Http\Request $request
     * @param Throwable $e
     * @return \Illuminate\Http\JsonResponse
     */
    private function handleApiException($request, Throwable $e)
    {
        $e = $this->prepareException($e);

        if ($e instanceof HttpResponseException) {
            $e = $e->getResponse();
        }
        if ($e instanceof ValidationException) {
            $e = $this->convertValidationExceptionToResponse($e, $request);
        }

        return $this->customApiResponse($e);
    }

    /**
     * Return Custom API Response
     *
     * @param mixed $e
     * @return \Illuminate\Http\JsonResponse
     */
    private function customApiResponse($e)
    {
        if (method_exists($e, 'getStatusCode')) {
            $statusCode = $e->getStatusCode() || 500;
        }

        $response = [];
        $response['status'] = $statusCode;

        switch ($statusCode) {
            case 404:
                $response['message'] = 'Bad request (something wrong with URL or parameters)';
                break;
            case 401:
                $response['message'] = 'Not authorized (not logged in)';
                break;
            case 403:
                $response['message'] = 'Logged in but access to requested area is forbidden';
                break;
            case 404:
                $response['message'] = 'Not Found (page or other resource doesn\'t exist)';
                break;
            default:
                $response['message'] = 'General server error';
                break;
        }

        return response()->json($response, $statusCode);
    }

}
