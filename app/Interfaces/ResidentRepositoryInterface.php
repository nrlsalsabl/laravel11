<?php

namespace App\Interfaces;

use App\Models\Resident;

interface ResidentRepositoryInterface
{
    public function getAllResident();

    public function getResidentById(int $id);

    public function createResident(array $data);

    public function updateResident(array $data, int $id);

    public function deleteResident(int $id);
}