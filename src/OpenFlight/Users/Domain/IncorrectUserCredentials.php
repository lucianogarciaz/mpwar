<?php

declare(strict_types=1);

namespace CodelyTv\OpenFlight\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Shared\Domain\DomainError;

final class IncorrectUserCredentials extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function errorCode(): string
    {
        return 'invalid_credentials';
    }

    protected function errorMessage(): string
    {
        return sprintf('Incorrect credentials');
    }
}
