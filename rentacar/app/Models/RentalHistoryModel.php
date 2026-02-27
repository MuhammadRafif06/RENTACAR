<?php

namespace App\Models;

use CodeIgniter\Model;

class RentalHistoryModel extends Model
{
    protected $table = 'rental_history';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'booking_id',
        'status',
        'note',
        'changed_at'
    ];
}