<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contracts\Controller\ProductControllerInterface;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Services\CategoryServiceInterface;
use App\Contracts\Services\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller implements ProductControllerInterface
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductServiceInterface $productService,
                                CategoryServiceInterface $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function show($id)
    {
        $product = $this->productService->findById($id);

        return view('shop.product-page', compact('product'));
    }

    public function index()
    {
        $products = $this->productService->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->getCategories();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validateInput($request,"|required");

        $this->productService->create($request);

        $notification = array(
            'message' => "Created new product successful!",
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function delete($id)
    {
        $this->productService->delete($id);

        $notification = array(
            'message' => "Deleted successful!",
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function edit($id)
    {
        $product = $this->productService->findById($id);
        $categories = $this->getCategories();
        return view('admin.products.edit', compact('product', "categories"));
    }

    public function update(Request $request, $id)
    {
        $this->validateInput($request);

        $this->productService->edit($request, $id);

        $notification = array(
            'message' => "Update successful!",
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function getCategories()
    {
        return $this->categoryService->all();
    }

    public function search(Request $request)
    {
        $products = $this->productService->search($request->keyword);

        return view('admin.products.index',compact('products'));
    }

    public function validateInput($request, $required=null)
    {
        return $request->validate([
            'name' => 'required|min:2',
            'image' => "max:10240$required",
            'description' => 'required|min:10',
            'price' => 'required',
            'category' => 'required'
        ]);
    }
}
