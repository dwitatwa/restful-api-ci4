<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDiriModel extends Model
{
  protected $table      = 'dt_diri';

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
}
