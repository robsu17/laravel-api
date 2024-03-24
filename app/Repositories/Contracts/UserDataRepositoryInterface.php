<?php

namespace App\Repositories\Contracts;

use App\Models\UserData;
use Illuminate\Support\Facades\Request;

interface UserDataRepositoryInterface
{

    /**
     * @return UserData[]
     */
    public function getAll(): array;

    public function getUserDataById(int $id): UserData|null;
    public function createUserData(array $userData): UserData|null;
    public function updateUserData(array $userDataUpdate): UserData|bool;
    public function destroyUserData(int $id): bool;
}
