<?php

namespace App\Controllers;

use App\Models\CarModel;
use App\Models\BookingModel;
use App\Models\PaymentModel;

class Home extends BaseController
{
    public function index()
    {
        $carModel = new CarModel();

        $cars = $carModel
            ->where('status', 'available')
            ->findAll();

        return view('user/home', [
            'cars' => $cars
        ]);
    }

    public function detail($id)
    {
        $carModel = new CarModel();
        $car = $carModel->find($id);

        if (!$car) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        return view('user/detail', [
            'car' => $car
        ]);
    }

    public function book($id)
{
    $bookingModel = new \App\Models\BookingModel();
    $carModel = new \App\Models\CarModel();

    $car = $carModel->find($id);

    $start = $this->request->getPost('tanggal_mulai');
    $end   = $this->request->getPost('tanggal_selesai');

    $days = (strtotime($end) - strtotime($start)) / 86400;
    if ($days <= 0) $days = 1;

    $total = $days * $car['price_per_day'];

    $insert = $bookingModel->insert([
        'user_id'     => session()->get('id'),
        'car_id'      => $id,
        'start_date'  => $start,
        'end_date'    => $end,
        'total_price' => $total,
        'status'      => 'pending'
    ]);

    if (!$insert) {
        dd($bookingModel->errors()); // DEBUG
    }

    return redirect()->to('/')->with('success', 'Booking berhasil!');
}

    public function history()
    {
        $bookingModel = new \App\Models\BookingModel();

        $bookings = $bookingModel
            ->select('bookings.*, cars.brand, cars.model, cars.image')
            ->join('cars', 'cars.id = bookings.car_id')
            ->where('bookings.user_id', session()->get('id'))
            ->orderBy('bookings.id', 'DESC')
            ->findAll();

        return view('user/history', [
            'bookings' => $bookings
        ]);
    }
}