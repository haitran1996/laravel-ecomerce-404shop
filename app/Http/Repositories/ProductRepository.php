<?php


namespace App\Http\Repositories;


use App\Product;
use App\Contracts\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function model()
    {
        // TODO: Implement model() method.
    }

    public function all()
    {
        return $this->product->paginate(4);
    }

    public function storeOrEdit($obj)
    {
        $obj->save();
    }

    public function findById($id)
    {
        return $this->product->find($id);
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function create($obj)
    {
        // TODO: Implement create() method.
    }

    public function delete($id)
    {
        $this->product->find($id)->delete();
    }

    public function search($keyword)
    {
        return $this->product->where('name','like', "%$keyword%")->paginate(4);
    }
}
