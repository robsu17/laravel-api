<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Repositories\Contracts\UserDataRepositoryInterface;
use App\Repositories\UserDataRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use function PHPUnit\Framework\isNull;

class ApiUserDataController extends Controller
{
    protected UserDataRepositoryInterface $usersDataRepository;
    public function __construct(UserDataRepositoryInterface $usersDataRepository)
    {
        $this->usersDataRepository = $usersDataRepository;
    }

    public function index()
    {
        try {
            $usersData = $this->usersDataRepository->getAll();

            return Response::json([
                'count' => count($usersData),
                'usersData' => $usersData
            ]);
        } catch (\Exception $exception) {
            return Response::json([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ], 400);
        }
    }

    public function store(Request $request)
    {
        try {
            $userDataStored = $this->usersDataRepository->createUserData($request->all());

            return Response::json([
                'userData' => $userDataStored
            ], 201);
        } catch (\Exception $exception) {
            return Response::json([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ], 400);
        }
    }

    public function show(int $id)
    {
        try {
            $userDataFindById = $this->usersDataRepository->getUserDataById($id);

            if (is_null($userDataFindById)) {
                return Response::json([
                    'message' => 'User data not found'
                ], 404);
            }

            return Response::json([
                'id' => $id,
                'userData' => $userDataFindById
            ]);
        } catch (\Exception $exception) {
            return Response::json([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ], 400);
        }
    }

    public function update(Request $request)
    {
        $data = [
            'id' => $request->route()->parameter('id'),
            'attributes' => array_map(function ($attributes) {
                return hash('sha512', $attributes);
            }, $request->all())
        ];


        try {
            $userUpdated = $this->usersDataRepository->updateUserData($data);

            return Response::json([
               'userUpdated' => $userUpdated
            ]);
        } catch (\Exception $exception) {
            return Response::json([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ], 400);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $userDataDeleted = $this->usersDataRepository->destroyUserData($request->all()['id']);

            if ($userDataDeleted) {
                return Response::json([
                    'message' => 'UserData apagado'
                ]);
            }

            return Response::json([
                'message' => 'UserData não encontrado ou inexistente'
            ], 404);

        } catch (\Exception $exception) {
            return Response::json([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ], 400);
        }
    }
}
