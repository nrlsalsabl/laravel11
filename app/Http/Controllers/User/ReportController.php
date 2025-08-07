<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Interfaces\ReportCategoryRepositoryInterface;
use App\Interfaces\ReportRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private ReportRepositoryInterface $reportRepository;
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(
        ReportRepositoryInterface $reportRepository,
        ReportCategoryRepositoryInterface $reportCategoryRepository,
    ) {
        $this->reportRepository = $reportRepository;
        $this->reportCategoryRepository = $reportCategoryRepository;
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

    public function myReport(Request $request)
    {
        $status = $request->input('status', 'delivered');

        $reports = $this->reportRepository->getReportsByResidentId($status);

        return view('user.report.my-report', compact('reports'));
    }

    public function show($code)
    {
        $report = $this->reportRepository->getReportByCode($code);

        return view('user.report.show', compact('report'));
    }

    public function take()
    {
        return view('user.report.take');
    }

    public function preview()
    {
        return view('user.report.preview');
    }

    public function create()
    {
        $categories = $this->reportCategoryRepository->getAllReportCategories();

        return view('user.report.create', compact('categories'));
    }

    public function store(StoreReportRequest $request)
    {
        $data = $request->validated();

        $data['code'] = 'BWALAPOR' . mt_rand(100000, 999999);
        $data['resident_id'] = Auth::user()->resident->id;
        $data['image'] = $request->file('image')->store('assets/report/image', 'public');

        $this->reportRepository->createReport($data);

        return redirect()->route('report.success');
    }

    public function success()
    {
        return view('user.report.success');
    }
}
