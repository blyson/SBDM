<?php

namespace App;

class UsersCollection
{

    /**
     * @var array
     */
    private static array $users = [];

    /**
     * @param \App\User $user
     * @return void
     */
    public function add(User $user): void
    {
        self::$users[] = $user;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return self::$users;
    }

}
