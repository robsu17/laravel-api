<?php

namespace App\Repositories;

use App\Models\UserData;
use App\Repositories\Contracts\UserDataRepositoryInterface;
use Illuminate\Support\Facades\Log;

class UserDataRepository implements UserDataRepositoryInterface
{
    public function getAll(): array
    {
        return UserData::all()->toArray();
    }

    public function getUserDataById(int $id): UserData|null
    {
        return UserData::find($id);
    }

    public function createUserData(array $userData): UserData|null
    {
        $userDataStore = [
            'userDocument' =>  hash('sha512', $userData['userDocument']),
            'creditCardToken' =>  hash('sha512', $userData['creditCardToken']),
            'value' =>  $userData['value']
        ];

        return UserData::create($userDataStore);
    }

    public function updateUserData(array $userDataUpdate): UserData|bool
    {
        $isUserDataUpdated = UserData::where('id', $userDataUpdate['id'])->update($userDataUpdate['attributes']);

        if ($isUserDataUpdated) {
            return UserData::find($userDataUpdate['id']);
        }

        return $isUserDataUpdated;
    }

    public function destroyUserData(int $id): bool
    {
        return UserData::destroy($id);
    }
}
