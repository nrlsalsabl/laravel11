<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportCategoryRequest;
use App\Interfaces\ReportCategoryRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Http\Request;

class ReportCategoryController extends Controller
{
    private ReportCategoryRepositoryInterface $reportCategoryRepository;

    public function __construct(ReportCategoryRepositoryInterface $reportCategoryRepository)
    {
        $this->reportCategoryRepository = $reportCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->reportCategoryRepository->getAllReportCategories();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportCategoryRequest $request)
    {
        $data = $request->validated();

        $data['image'] = $request->file('image')->store('assets/report-category/image', 'public');

        $this->reportCategoryRepository->createReportCategory($data);

        Swal::toast('Data Kategori Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.report-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->reportCategoryRepository->getReportCategoryById($id);

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->reportCategoryRepository->getReportCategoryById($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validated();

        if ($request->image) {
            $data['image'] = $request->file('image')->store('assets/report-category/image', 'public');
        }

        $this->reportCategoryRepository->updateReportCategory($data, $id);

        Swal::toast('Data Kategori Berhasil Diupdate', 'success')->timerProgressBar();

        return redirect()->route('admin.report-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->reportCategoryRepository->deleteReportCategory($id);

        Swal::toast('Data Kategori Berhasil Dihapus', 'success')->timerProgressBar();

        return redirect()->route('admin.report-category.index');
    }
}
