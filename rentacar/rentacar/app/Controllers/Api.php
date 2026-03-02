<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CarModel;
use App\Models\BookingModel;

class Api extends ResourceController
{
    protected $format = 'json';

    // GET /api/cars
    public function cars()
    {
        $carModel = new CarModel();

        $cars = $carModel
            ->where('status', 'available')
            ->findAll();

        return $this->respond($cars);
    }

    // GET /api/cars/{id}
    public function car($id = null)
    {
        $carModel = new CarModel();
        $car = $carModel->find($id);

        if (!$car) {
            return $this->failNotFound('Car not found');
        }

        return $this->respond($car);
    }

    // POST /api/bookings
    public function createBooking()
    {
        $bookingModel = new BookingModel();
        $carModel = new CarModel();

        $carId = $this->request->getPost('car_id');

        $car = $carModel->find($carId);

        if (!$car || $car['status'] != 'available') {
            return $this->fail('Car not available');
        }

        $bookingModel->save([
            'user_id'    => 1,
            'car_id'     => $carId,
            'start_date' => $this->request->getPost('start_date'),
            'end_date'   => $this->request->getPost('end_date'),
            'status'     => 'pending'
        ]);

        $carModel->update($carId, [
            'status' => 'rented'
        ]);

        return $this->respondCreated([
            'message' => 'Booking created successfully'
        ]);
    }

    // GET /api/bookings
    public function bookings()
    {
        $bookingModel = new BookingModel();
        return $this->respond($bookingModel->findAll());
    }
}