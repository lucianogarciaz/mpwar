<?php


namespace CodelyTv\OpenFlight\Users\Application;


use CodelyTv\OpenFlight\Users\Domain\IncorrectUserCredentials;
use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use Monolog\Processor\UidProcessor;
use mysql_xdevapi\Exception;

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
        $userArr = $this->repository->findByUsername($username);
        if (empty($userArr)) {
            throw new IncorrectUserCredentials();
        }

        $currentUser = $userArr[0];
        if ($currentUser["Password"] !== $password) {
            throw new IncorrectUserCredentials();
        }
    }
}