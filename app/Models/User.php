<?php

namespace App\Models;

use Phaseolies\Database\Entity\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $creatable = [
        "name",
        "email",
        "password",
        "remember_token",
        "two_factor_secret",
        "two_factor_recovery_codes"
    ];

    /**
     * The attributes that should be hidden for arrays and JSON.
     *
     * @var array
     */
    protected $unexposable = [
        "password",
        "remember_token",
        "two_factor_secret",
        "two_factor_recovery_codes"
    ];
}
