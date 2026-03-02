<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'booking_id',
        'amount',
        'payment_method',
        'payment_status',
        'paid_at'
    ];

    protected $useTimestamps = false;
}