<?php

declare(strict_types=1);

namespace CodelyTv\OpenFlight\Users\Infrastructure;

use CodelyTv\OpenFlight\Users\Domain\IncorrectCredentials;
use CodelyTv\OpenFlight\Users\Domain\User;
use CodelyTv\OpenFlight\Users\Domain\UserRepository;
use CodelyTv\Shared\Domain\ValueObject\Uuid;
use CodelyTv\Shared\Infrastructure\Persistence\Mysql;

final class MysqlUserRepository implements UserRepository
{
    public function __construct(private Mysql $mysql)
    {
    }

    public function Save(User $user): void
    {
        $sql       = 'INSERT INTO user VALUES(:id, :username, :name,:last_name, :password)';
        $statement = $this->mysql->PDO()->prepare($sql);
        $statement->bindValue(':id', $user->ID()->value());
        $statement->bindValue(':username', $user->Username());
        $statement->bindValue(':name', $user->Name());
        $statement->bindValue(':last_name', $user->LastName());
        $statement->bindValue(':password', $user->Password());
        $statement->execute();
    }

    public function FindUser(string $username): User
    {
        $query     = 'SELECT * FROM user WHERE username = :username LIMIT 1';
        $statement = $this->mysql->PDO()->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();

        $data = $statement->fetch();
        if ($data) {
            return new User(
                new Uuid($data['Id']),
                $data['Username'],
                $data['Name'],
                $data['LastName'],
                $data['Password']
            );
        }

        throw new IncorrectCredentials();
    }
}