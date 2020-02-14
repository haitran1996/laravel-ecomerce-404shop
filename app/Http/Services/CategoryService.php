<?php


namespace App\Http\Services;


use App\Category;
use App\Contracts\Repositories\CategoryRepositoryInterface;
use App\Contracts\Services\CategoryServiceInterface;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Storage;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    public function model()
    {
        // TODO: Implement model() method.
    }

    public function all()
    {
        return $this->categoryRepo->all();
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($request, $id)
    {
        $category = $this->categoryRepo->findById($id);
        $category->name = $request->name;
        if ($request->image) {
            $path = $request->file('image')->store('public/images/categories');
            $category->image = str_replace('public/', '', $path);
        }

        $category->description = $request->description;

        return $this->categoryRepo->storeOrEdit($category);
    }

    public function create($request)
    {
        $path = $request->file('image')->store('public/images/categories');

        $category = new Category();
        $category->name = $request->name;
        $category->image = str_replace('public/','',$path);

        $category->description = $request->description;

        return $this->categoryRepo->create($category);
    }

    public function delete($obj)
    {
        Storage::delete($obj->image);
        return $this->categoryRepo->delete($obj);
    }

    public function findById($id)
    {
        return $this->categoryRepo->findById($id);
    }

    public function storeOrEdit($obj)
    {
        return $this->categoryRepo->storeOrEdit($obj);
    }

    public function search($keyword)
    {
        return $this->categoryRepo->search($keyword);
    }
}
