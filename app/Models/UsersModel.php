<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    /**
     * table name
     */
    protected $table = "users";
    protected $primaryKey = 'id'; // Primary key

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

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}