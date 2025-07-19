<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\ReportCategoryRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{   
    private ReportRepositoryInterface $reportRepository;
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
        ReportCategoryRepositoryInterface $reportCategoryRepository
    ) {
        $this->reportRepository = $reportRepository;
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    public function index() 
    {   
        $categories = $this->reportCategoryRepository->getAllReportCategories();

        $reports = $this->reportRepository->getLatestReports();

        return view('user.home', compact('categories', 'reports'));
    }
}
