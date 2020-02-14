<?php


namespace App\Contracts\Services;


interface ProductServiceInterface extends  AbstractServiceInterface
{
    public function delete($obj);
}
