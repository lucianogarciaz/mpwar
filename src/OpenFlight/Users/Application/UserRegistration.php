<?php


namespace CodelyTv\OpenFlight\Users\Application;

use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class UserRegistration
{

    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $id, string $name, string $lastname, string $password): void
    {
        $uuid = new Uuid($id);
        $user = User::RegisterUser($uuid, $name, $lastname, $password);
        $this->repository->Save($user);
    }
}