<?php

namespace App\Exceptions\Api;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BadRequestException extends Exception
{
    public function __construct(
        protected array $messages
    ) {}

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response()->error(
            $this->messages,
            400,
            'Bad Request'
        ); 
    }
}
