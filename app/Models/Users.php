<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['organization', 'email', 'address', 'password', 'profile_picture', 'role', 'token', 'token_expired_at', 'status'];
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}