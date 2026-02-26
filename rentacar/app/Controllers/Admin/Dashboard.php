<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CarModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $carModel = new CarModel();

        $totalCars = $carModel->countAll();

        $available = $carModel->where('status', 'available')->countAllResults();
        $rented = $carModel->where('status', 'rented')->countAllResults();
        $maintenance = $carModel->where('status', 'maintenance')->countAllResults();

        $utilization = 0;

        if ($totalCars > 0) {
            $utilization = round(($rented / $totalCars) * 100);
        }

        return view('admin/dashboard', [
            'totalCars' => $totalCars,
            'available' => $available,
            'rented' => $rented,
            'maintenance' => $maintenance,
            'utilization' => $utilization
        ]);
    }
}