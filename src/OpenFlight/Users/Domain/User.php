<?php


namespace CodelyTv\OpenFlight\Users\Domain;


use CodelyTv\Shared\Domain\Aggregate\AggregateRoot;
use CodelyTv\Shared\Domain\ValueObject\Uuid;

class User extends AggregateRoot
{
    const pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';

    public function __construct(private Uuid $id, private string $name, private string $lastname, private string $password)
    {
    }

    public static function RegisterUser(Uuid $id, string $name, string $lastname, string $password): User
    {
        self::validateName($name);
        self::validateLastName($lastname);
        self::validatePassword($password);
        return new self($id, $name, $lastname, $password);
    }

    private static function validateName(string $name): void
    {
        if ($name == "") {
            throw new EmptyName();
        }
    }

    private static function validateLastName(string $lastname): void
    {
        if ($lastname == "") {
            throw new EmptyLastName();
        }
    }

    public static function validatePassword(string $password): void
    {
        if (!preg_match(self::pattern, $password)) {
            throw new InvalidPassword($password);
        }
    }
}