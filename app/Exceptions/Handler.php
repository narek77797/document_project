<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e): Response|JsonResponse|ResponseAlias
    {
        $httpCode = ResponseAlias::HTTP_INTERNAL_SERVER_ERROR;
        $statusCode =  $e->getCode();
        $details = [
            'message' => $e->getMessage(),
        ];

        if ($e instanceof ValidationException) {
            $httpCode = ResponseAlias::HTTP_UNPROCESSABLE_ENTITY;
            $statusCode = BusinessLogicException::VALIDATION_FAILED;
            $details['message'] = $e->getMessage();
            foreach ($e->errors() as $key => $error) {
                $details['errors'][$key] = $error[0] ?? 'Unknown error';
            }
        }

        if ($e instanceof BusinessLogicException) {
            $httpCode = $e->getHttpStatusCode();
            $statusCode = $e->getStatus();
            $details['message'] = $e->getStatusMessage();
        }

        $data = [
            'status'  => $statusCode,
            'errors' => $details,
        ];

        if ($httpCode === ResponseAlias::HTTP_INTERNAL_SERVER_ERROR && !config('app.debug')) {
            $data['errors'] = [
                'message' => 'Server error',
            ];
        }

        return response()->json($data, $httpCode);
    }
}
