<?php

namespace App\Repositories;

use App\Interfaces\ReportRepositoryInterface;
use App\Models\Report;

class ReportRepository implements ReportRepositoryInterface
{
    public function getAllReports()
    {
        return Report::with('user')->paginate(10);
    }

    public function getReportById(int $id)
    {
        return Report::where('id', $id)->first();
    }

    public function createReport(array $data)
    {
        return Report::create($data);
    }

    public function updateReport(array $data, int $id)
    {
        $report = $this->getReportById($id);

        return $report->update($data);
    }

    public function deleteReport(int $id)
    {
        $report = $this->getReportById($id);

        return $report->delete();
    }
}