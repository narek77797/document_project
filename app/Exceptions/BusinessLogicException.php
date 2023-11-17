<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

abstract class BusinessLogicException extends Exception
{
    public const NOT_FOUND = 404;
    public const UNKNOWN_ERROR = 720;
    public const VALIDATION_FAILED = 600;

    private int $httpStatusCode = ResponseAlias::HTTP_BAD_REQUEST;

    abstract public function getStatus(): int;
    abstract public function getStatusMessage(): string;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }
}
