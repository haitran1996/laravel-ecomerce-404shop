<?php


namespace App\Contracts\Services;


interface AbstractServiceInterface
{
    public function model();

    public function all();

    public function storeOrEdit($obj);

    public function show($id);

//    public function edit($id);

    public function create($request);
}
