<?php

namespace App\Models;

use CodeIgniter\Model;

class accountModel extends Model
{
  protected $table = 'account';
  protected $allowedFields = ['name', 'email', 'username', 'password'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
