<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $creatable = ['name', 'email', 'password', 'remember_token'];

    /**
     * The attributes that should be hidden for arrays and JSON.
     *
     * @var array
     */
    protected $unexposable = ['password', 'remember_token'];

    /**
     * Default page size for pagination
     *
     * @var int
     */
    protected $pageSize = 10;

    /**
     * Indicates whether the model should maintain timestamps
     *
     * @var bool
     */
    protected $timeStamps = true;
}
