<?php

namespace App\Service;

use App\Http\Resources\UserResource;
use App\Interface\Repository\UserRepositoryInterface;
use App\Interface\Service\UserServiceInterface;



class UserService implements UserServiceInterface
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findUser()
    {
        $userRepository =$this->userRepository->findMany();
        return UserResource::collection($userRepository);
    }

    public function findUserById(int $id)
    {
        $userRepository =$this->userRepository->findOneById($id);
        return UserResource::collection($userRepository);
    }

    public function createUser(object $payload)
    {
        $userRepository =$this->userRepository->create($payload);
        return UserResource::collection($userRepository);
    }

    public function updateUser(object $payload, int $id)
    {
        $userRepository =$this->userRepository->update($payload, $id);
        return UserResource::collection($userRepository);
    }

    public function deleteUser(int $id)
    {
        $userRepository =$this->userRepository->delete($id);
        return UserResource::collection($userRepository);
    }
}