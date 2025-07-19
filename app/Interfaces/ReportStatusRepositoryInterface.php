<?php

namespace App\Interfaces;

use App\Models\Resident;

interface ReportStatusRepositoryInterface
{
    public function getAllReportStatuses();

    public function getReportStatusById(int $id);

    public function createReportStatus(array $data);

    public function updateReportStatus(array $data, int $id);

    public function deleteReportStatus(int $id);
}