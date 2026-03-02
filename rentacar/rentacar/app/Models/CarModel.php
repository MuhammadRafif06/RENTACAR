<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'category_id',
        'brand',
        'model',
        'year',
        'price_per_day',
        'status',
        'image',
        'created_at',
        'updated_at'
    ];
}