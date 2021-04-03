<?php


namespace Hamoh\User\Repositories;


use Hamoh\User\Models\User;

class UserRepo
{
    public function findByEmail($email){
        return User::query()->where('email',$email)->first();
    }
}
