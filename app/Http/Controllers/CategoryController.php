<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contracts\Controller\CategoryControllerInterface;
use App\Contracts\Services\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller implements CategoryControllerInterface
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit($id)
    {
        $category = $this->categoryService->findById($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function delete($id)
    {
        $category = $this->categoryService->findById($id);
        $this->categoryService->delete($category);

        $notification= array(
            "message" => "Deleted successful!",
            "alert-type" => "success"
        );

        return back()->with($notification);
    }

    public function store(Request $request)
    {
        $this->validateInput($request);

        $this->categoryService->create($request);

        $notification= array(
            "message" => "Created successful!",
            "alert-type" => "success"
        );

        return back()->with($notification);
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $this->categoryService->edit($request, $id);

        $notification= array(
            "message" => "Updated successful!",
            "alert-type" => "success"
        );

        return back()->with($notification);
    }

    public function search(Request $request)
    {
        $categories = $this->categoryService->search($request->keyword);

        return view('admin.categories.index',compact('categories'));
    }

    public function validateInput($request)
    {
        return $request->validate([
           'name' => 'required|min:2',
            'image' => 'max:10240',
            'description' => 'required|min:10'
        ]);
    }
}
