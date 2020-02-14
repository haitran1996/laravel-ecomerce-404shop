<?php


namespace App\Contracts\Services;


interface UserServiceInterface extends AbstractServiceInterface
{
    public function delete($id);
}
