<?php


namespace App\Http\Repositories;


use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function model()
    {
        // TODO: Implement model() method.
    }

    public function all()
    {
        return $this->category->paginate(4);
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($obj)
    {

    }

    public function create($obj)
    {
        return $this->storeOrEdit($obj);
    }

    public function delete($obj)
    {
        $obj->delete($obj);
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function storeOrEdit($obj)
    {
        $obj->save();
    }

    public function search($keyword)
    {
        return $this->category->where('name', 'like', "%$keyword%")->paginate(4);
    }
}
