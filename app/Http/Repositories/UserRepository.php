<?php


namespace App\Http\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    protected  $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function model()
    {
        // TODO: Implement model() method.
    }

    public function all()
    {
        return $this->user->paginate(10);
    }

    public function search($keyword)
    {
        return $this->user->where('email', 'like', "%$keyword%")->paginate(10);
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

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function storeOrEdit($obj)
    {
        $obj->save();
    }
}
