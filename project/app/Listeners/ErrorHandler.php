<?php

namespace App\Listeners;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ErrorHandler extends Handler
{
    public function render($request, \Throwable $exception) {
        if ($request->is('api/*')) {
            return $this->handleApiException($request, $exception);
        }

        return parent::render($request, $exception);
    }

    protected function handleApiException($request, \Throwable $exception) {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'message' => 'Required record not found.'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'message' => 'Invalid login information.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof AuthorizationException) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], Response::HTTP_FORBIDDEN);
        }

        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return response()->json([
                'message' => 'Validation error.',
                'validation_messages' => $exception->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($exception instanceof \InvalidArgumentException) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], Response::HTTP_CONFLICT);
        }

        dd($exception);

        return response()->json([
            'Other error...'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
