<?php

namespace App\Interfaces;

use App\Models\Resident;

interface ReportRepositoryInterface
{
    public function getAllReports();

    public function getLatestReports();

    public function getReportById(int $id);

    public function getReportByCode(string $code);

    public function getReportsByCategory(string $category);

    public function createReport(array $data);

    public function updateReport(array $data, int $id);

    public function deleteReport(int $id);
}