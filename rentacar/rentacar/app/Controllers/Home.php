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

    public function book($carId)
    {
        $bookingModel = new BookingModel();
        $carModel     = new CarModel();
        $paymentModel = new PaymentModel();

        $car = $carModel->find($carId);

        if (!$car || $car['status'] != 'available') {
            return redirect()->back();
        }

        $start = $this->request->getPost('start_date');
        $end   = $this->request->getPost('end_date');

        $days = (strtotime($end) - strtotime($start)) / (60 * 60 * 24);

        if ($days <= 0) {
            return redirect()->back();
        }

        $totalPrice = $days * $car['price_per_day'];

        $bookingModel->save([
            'user_id'    => 1, // sementara hardcode
            'car_id'     => $carId,
            'start_date' => $start,
            'end_date'   => $end,
            'status'     => 'pending'
        ]);

        $bookingId = $bookingModel->getInsertID();

        $paymentModel->save([
            'booking_id'     => $bookingId,
            'amount'         => $totalPrice,
            'payment_method' => 'transfer',
            'payment_status' => 'pending',
            'paid_at'        => null
        ]);

        $carModel->update($carId, [
            'status' => 'rented'
        ]);

        return redirect()->to('/');
    }
}