<?php

namespace App\Models;

use CodeIgniter\Model;

class CarcategoryModel extends Model
{
    protected $table = 'carcategories';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];
}