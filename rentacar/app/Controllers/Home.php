<?php

namespace App\Controllers;

use App\Models\CarModel;

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
}