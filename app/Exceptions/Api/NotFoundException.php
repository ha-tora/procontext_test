<?php

namespace App\Exceptions\Api;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotFoundException extends Exception
{
    public function __construct() {}

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response()->error(
            null,
            404,
            'Not Found'
        );
    }
}
