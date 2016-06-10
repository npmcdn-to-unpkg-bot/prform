<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';  //Declare table Name
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'full_name',
                                'user_name',
                                'email',
                                'password',
                                'user_type',
                                'is_enabled'
                            ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
                            'password',
                            'remember_token'
                        ];
}
