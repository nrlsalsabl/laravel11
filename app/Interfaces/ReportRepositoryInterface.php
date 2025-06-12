<?php

namespace App\Interfaces;

use App\Models\Resident;

interface ReportRepositoryInterface
{
    public function getAllReports();

    public function getReportById(int $id);

    public function createReport(array $data);

    public function updateReport(array $data, int $id);

    public function deleteReport(int $id);
}