<?php

namespace App\Repositories;

use App\Interfaces\ResidentRepositoryInterface;
use App\Models\Resident;
use App\Models\User;

class ResidentRepository implements ResidentRepositoryInterface
{
    public function getAllResident()
    {
        return Resident::with('user')->paginate(10);
    }

    public function getResidentById(int $id)
    {
        return Resident::where('id', $id)->first();
    }

    public function createResident(array $data)
    {
        // return Resident::create($data);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        return $user->resident()->create($data);
    }

    public function updateResident(array $data, int $id)
    {
        $resident = $this->getResidentById($id);

        $resident->user->update([
            'name' => $data['name'],
            'password' => isset($data['password']) ? bcrypt($data['password']) : $resident->user->password,
        ]);

        return $resident->update($data);
    }

    public function deleteResident(int $id)
    {
        $resident = $this->getResidentById($id);

        $resident->user()->delete();

        return $resident->delete();
    }
}