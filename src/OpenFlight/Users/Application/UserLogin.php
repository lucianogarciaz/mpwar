<?php


namespace CodelyTv\OpenFlight\Users\Application;


use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class UserLogin
{

    /**
     * UserLogin constructor.
     * @param UserRepository $repository
     */
    public function __construct(private UserRepository $repository)
    {
    }

    public function __invoke(string $username, string $password): void
    {
        $user = User::LoginUser($username, $password);
        $this->repository->Login($user);
    }
}