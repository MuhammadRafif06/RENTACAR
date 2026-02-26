<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CarModel;

class Car extends BaseController
{
    protected $carModel;

    public function __construct()
    {
        $this->carModel = new CarModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Fleet Management',
            'cars' => $this->carModel->findAll()
        ];

        return view('admin/cars/index', $data);
    }

    public function create()
    {
        return view('admin/cars/create');
    }

    public function store()
    {
        $imageFile = $this->request->getFile('image');
        $imageName = null;

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {

            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);
        }

        $this->carModel->save([
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price_per_day' => $this->request->getPost('price_per_day'),
            'status' => $this->request->getPost('status'),
            'image' => $imageName
        ]);

        return redirect()->to('/admin/cars')
            ->with('success', 'Car added successfully!');
    }

    public function edit($id)
    {
        $car = $this->carModel->find($id);

        if (!$car) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Car not found');
        }

        return view('admin/cars/edit', [
            'car' => $car
        ]);
    }

    public function update($id)
    {
        $car = $this->carModel->find($id);

        if (!$car) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Car not found');
        }

        $imageFile = $this->request->getFile('image');
        $imageName = $car['image']; // default pakai foto lama

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {

            // hapus foto lama kalau ada
            if ($car['image'] && file_exists('uploads/' . $car['image'])) {
                unlink('uploads/' . $car['image']);
            }

            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads', $imageName);
        }

        $this->carModel->update($id, [
            'brand' => $this->request->getPost('brand'),
            'model' => $this->request->getPost('model'),
            'year' => $this->request->getPost('year'),
            'price_per_day' => $this->request->getPost('price_per_day'),
            'status' => $this->request->getPost('status'),
            'image' => $imageName
        ]);

        return redirect()->to('/admin/cars')
            ->with('success', 'Car updated successfully!');
    }

    public function delete($id)
{
    $car = $this->carModel->find($id);

    if (!$car) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Car not found');
    }

    // hapus foto kalau ada
    if ($car['image'] && file_exists('uploads/'.$car['image'])) {
        unlink('uploads/'.$car['image']);
    }

    $this->carModel->delete($id);

    return redirect()->to('/admin/cars')
                     ->with('success', 'Car deleted successfully!');
}
}