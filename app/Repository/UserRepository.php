<?php

namespace App\Repository;

use App\Eloquent\User;
use App\Repository\AbstractRepository;

class UserRepository extends AbstractRepository
{
    /**
     * ClassNameRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
