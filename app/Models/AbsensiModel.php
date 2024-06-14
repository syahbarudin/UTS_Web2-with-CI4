<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'latitude', 'longitude'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = null;

    protected $returnType = 'object';
}
