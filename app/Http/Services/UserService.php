<?php


namespace App\Http\Services;


use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Services\UserServiceInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function model()
    {
        // TODO: Implement model() method.
    }

    public function all()
    {
        return $this->userRepo->all();
    }

    public function store(array $data)
    {
        // TODO: Implement store() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function create($request)
    {
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        return $this->userRepo->storeOrEdit($user);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function storeOrEdit($obj)
    {
        // TODO: Implement storeOrEdit() method.
    }

    public function search($keyword)
    {
        return $this->userRepo->search($keyword);
    }
}
