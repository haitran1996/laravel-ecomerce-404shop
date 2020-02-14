<?php

namespace App\Http\Controllers;

use App\Contracts\Controller\UserControllerInterface;
use App\Contracts\Services\UserServiceInterface;
use Illuminate\Http\Request;


class UserController extends Controller implements UserControllerInterface
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->all();

        return view('admin.users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $users = $this->userService->search($request->keyword);

        return view('admin.users.index',compact('users'));
    }

    public function store(Request $request)
    {
        $this->userService->create($request);

        return back();
    }

    public function create()
    {
        // TODO: Implement create() method.
    }
}
