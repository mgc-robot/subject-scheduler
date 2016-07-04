<?php
namespace App\Transformers;

use App\Eloquent\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'id'         => (int)$user->id,
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'gender'     => $user->gender == 'm' ? 'Male' : 'Female',
            'email'      => $user->email,
            'created_at' => $user->created_at->diffForHumans()
        ];
    }
}