<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPlans extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'user_plan';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['user_id', 'plan_id', 'status'];
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}