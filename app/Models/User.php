<?php

namespace App\Models;

use Phaseolies\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Primary Key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Table Name
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Creatable Attributes
     *
     * @var array
     */
    protected $creatable = ['name', 'email', 'password', 'remember_token'];

    /**
     * Unexposable Attributes
     *
     * @var array
     */
    protected $unexposable = ['password', 'remember_token'];

    /**
     * Page Size
     *
     * @var int
     */
    protected $pageSize = 10;

    /**
     * Indicates whether the model should maintain timestamps (`created_at` and `updated_at` fields.).
     *
     * @var bool
     */
    protected $timeStamps = true;
}
