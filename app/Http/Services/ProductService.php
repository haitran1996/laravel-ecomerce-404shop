<?php


namespace App\Http\Services;


use App\Category;
use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Contracts\Services\ProductServiceInterface;
use App\Product;

class ProductService implements ProductServiceInterface
{
    protected  $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function model()
    {
        // TODO: Implement model() method.
    }

    public function all()
    {
        return $this->productRepo->all();
    }

    public function storeOrEdit($obj)
    {
        // TODO: Implement storeOrEdit() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($request, $id)
    {
        $product = $this->productRepo->findById($id);

        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->image) {
            $product->image = $request->image;
        }
        $product->price = str_replace('.','',$request->price);
        $product->category_id = $request->category;

        $this->productRepo->storeOrEdit($product);
    }

    public function create($request)
    {
        $path = $request->file('image')->store('public/images/products');

        $product = new Product();
        $product->name = $request->name;
        $product->image = str_replace('public/','',$path); //
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price = $request->price;

        return $this->productRepo->storeOrEdit($product);
    }

    public function delete($id)
    {
        return $this->productRepo->delete($id);
    }

    public function findById($id)
    {
        return $this->productRepo->findById($id);
    }

    public function search($keyword)
    {
        return $this->productRepo->search($keyword);
    }
}
