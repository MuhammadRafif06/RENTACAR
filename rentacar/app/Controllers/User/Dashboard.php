<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BookingModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $bookingModel = new BookingModel();

        $userId = session()->get('id');

        // ambil booking milik user + mobil
        $bookings = $bookingModel
            ->select('bookings.*, cars.brand, cars.model, cars.image')
            ->join('cars', 'cars.id = bookings.car_id')
            ->where('bookings.user_id', $userId)
            ->orderBy('bookings.id', 'DESC')
            ->findAll();

        return view('user/dashboard', [
            'bookings' => $bookings
        ]);
    }
}