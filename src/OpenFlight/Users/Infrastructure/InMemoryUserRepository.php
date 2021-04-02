<?php
declare(strict_types=1);


namespace CodelyTv\OpenFlight\Users\Infrastructure;


use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

final class InMemoryUserRepository implements UserRepository
{

    public function Save(User $user): void
    {
    }

    public function FindByID(Uuid $id): User
    {
        return new User(new Uuid(""), "name", "last_name", "password");
    }
}