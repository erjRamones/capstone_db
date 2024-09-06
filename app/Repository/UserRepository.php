<?php

namespace App\Repository;

use App\Interface\Repository\UserRepositoryInterface;
use App\Models\User;
use App\Models\User_Account;
use Illuminate\Http\Response;


class UserRepository implements UserRepositoryInterface
{
    public function findByEmail(string $email)
    {
        return User_Account::where('email', $email)->first();
    }

    public function findMany()
        {
            return User_Account::all();
        }

        public function findOneById(int $id)
        {
            return User_Account::FindorFail($id);
        }
    
        public function create(object $payload)
        {
            $user = new User_Account();

            $user->status_id = $payload->status_id;
            $user->last_name = $payload->last_name;
            $user->first_name = $payload->first_name;
            $user->middle_name = $payload->middle_name;
            $user->password = $payload->password;
            $user->email = $payload->email;
            $user->employee_id = $payload->employee_id;

            $user->save();
            return $user->refresh();            
        }
    
        public function update(object $payload, int $id)
        {
            $user = User_Account::FindorFail($id);
            
            $user->status_id = $payload->status_id;
            $user->last_name = $payload->last_name;
            $user->first_name = $payload->first_name;
            $user->middle_name = $payload->middle_name;
            $user->password = $payload->password;
            $user->email = $payload->email;
            $user->employee_id = $payload->employee_id;

            $user->save();
            return $user->refresh();            
        }
    
        public function delete(int $id)
        {
            $user = User_Account::FindorFail($id);
            $user ->delete();

            return response()->json([
                'message' => 'Success'
            ], Response::HTTP_OK);
        }
    
}
