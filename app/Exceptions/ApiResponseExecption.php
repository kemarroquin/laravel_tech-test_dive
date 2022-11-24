<?php

namespace App\Exceptions;

use Exception;

class ApiResponseExecption extends Exception
{

    /**
     * Default Constructor
     * 
     * @param string|int $msgORcode
     * @param integer $code
     * @return void
     */
    public function __construct($msgORcode = null, $code = null)
    {
        $m = is_int($msgORcode) ? '' : (is_numeric($msgORcode) ? '' : $msgORcode);
        $c = isset($code) ? $code : (is_int($msgORcode) ? $msgORcode : 500);

        $this->message = $m;
        $this->code = $c;
    }

    /**
     * Report API Exception.
     *
     * @return void
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return JsonResponse|Response
     */
    public function render()
    {
        return $this->customApiResponse($this->message, $this->code);
    }

    /**
     * Return Custom API Response
     *
     * @param string $msg
     * @param integer $code default
     * @return \Illuminate\Http\JsonResponse
     */
    private function customApiResponse($msg, $code)
    {
        $msgByError = [
            400 => 'Bad request (something wrong with URL or parameters)',
            401 => 'Not authorized (not logged in)',
            403 => 'Logged in but access to requested area is forbidden',
            404 => 'Not Found (Resource doesn\'t exist)',
            500 => 'General server error',
        ];
        $statusCode = $code ?? 500;
        $resMSG = empty($msg) ? $msgByError[$statusCode] : $msg ;

        return response()->json($resMSG, $statusCode);
    }
    
}
