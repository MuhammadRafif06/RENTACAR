<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_price',
        'status'
    ];

}