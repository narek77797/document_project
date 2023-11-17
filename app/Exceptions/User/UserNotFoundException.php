<?php

namespace App\Exceptions\User;

use App\Exceptions\BusinessLogicException;

class UserNotFoundException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return BusinessLogicException::NOT_FOUND;
    }

    public function getStatusMessage(): string
    {
        return 'User not found';
    }
}
