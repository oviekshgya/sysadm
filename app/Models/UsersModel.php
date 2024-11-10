<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    /**
     * table name
     */
    protected $table = "users";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nameUser',
        'email',
        'password',
        'idRole',
        'isActive',
        'created_at',
        'updated_at'
    ];
}