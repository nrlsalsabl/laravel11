<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportCategoryRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private ReportRepositoryInterface $reportRepository;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
    ) {
        $this->reportRepository = $reportRepository;
    }

    public function index(Request $request)
    {
        if ($request->category) {
            $reports = $this->reportRepository->getReportsByCategory($request->category);
        } else {
            $reports = $this->reportRepository->getAllReports();
        }
        return view('user.report.index', compact('reports'));
    }

    public function show($code)
    {
        $report = $this->reportRepository->getReportByCode($code);

        return view('user.report.show', compact('report'));
    }
}
