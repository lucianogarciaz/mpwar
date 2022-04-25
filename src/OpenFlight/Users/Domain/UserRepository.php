<?php

namespace CodelyTv\OpenFlight\Users\Domain;

interface UserRepository
{
    public function Save(User $user): void;

    public function FindUser(string $username): User;
}