<?php

declare(strict_types=1);

namespace CodelyTv\OpenFlight\Users\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;
use CodelyTv\Shared\Domain\DomainError;

final class EmptyLastName extends DomainError
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function errorCode(): string
    {
        return 'invalid_last_name';
    }

    protected function errorMessage(): string
    {
        return sprintf('The last name provided is empty');
    }
}
