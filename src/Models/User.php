<?php

namespace App\Models;

use Carbon\Carbon;
use Phaseolies\Database\Entity\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
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
