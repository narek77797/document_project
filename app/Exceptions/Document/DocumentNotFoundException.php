<?php

namespace App\Exceptions\Document;

use App\Exceptions\BusinessLogicException;

class DocumentNotFoundException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::NOT_FOUND;
    }

    public function getStatusMessage(): string
    {
        return 'Document not found';
    }
}