<?php


namespace App\Contracts\Controller;


use Illuminate\Http\Request;

interface AbstractControllerInterface
{
    public function index();

    public function create();

    public function store(Request $request);
}
