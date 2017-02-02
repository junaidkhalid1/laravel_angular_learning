<?php
namespace App\Transformers;

use Illuminate\Foundation\Auth\User;
use League\Fractal\TransformerAbstract;

/**
 * Created by PhpStorm.
 * User: Junaid KHALID
 * Date: 9/9/2016
 * Time: 7:57 PM
 */
class UserTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'My id' => $user->id,
            'My name' => $user->name,
        ];
    }

}