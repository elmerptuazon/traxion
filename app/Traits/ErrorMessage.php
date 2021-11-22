<?php


namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

trait ErrorMessage
{
    private function validationErrorMessage($errorCode, $errorMessage)
    {
        return response()->json([
            'message' => $errorMessage
        ], $errorCode);
    }
    
}
