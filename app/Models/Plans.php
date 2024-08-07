<?php

namespace App\Models;

use CodeIgniter\Model;

class Plans extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'plans';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['plan', 'price', 'status'];
    protected $useTimestamps        = true;
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
}