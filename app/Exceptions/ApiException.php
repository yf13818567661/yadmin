<?php

namespace App\Exceptions;

use Exception;
use Throwable;
class ApiException extends Exception
{
    public function __construct($message = "", $code = 400, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        return response()->json([
            'message' => $this->message,
            'code' => $this->code,
        ], $this->code);
    }
}
