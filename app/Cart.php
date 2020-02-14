<?php
namespace App;

use App\Product;

class Cart
{
    public $list = [];
    public $totalPrice = 0;

    public function __construct($oldCart = null)
    {
        if ($oldCart !== null) {
            $this->list = $oldCart->list;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($quantity, $idProduct)
    {
        $product = Product::find($idProduct);
        $item = array(
            'product' => $product,
            'quantity' => $quantity,
            'price' => $product->price * $quantity
        );

        if (!array_key_exists("$idProduct", $this->list)) {
            $this->totalPrice += $item['price'];
        } else {
            $this->totalPrice += ($quantity - $this->list["$idProduct"]['quantity']) * $product->price;
        }

        $this->list["$idProduct"] = $item;
    }

    public function update($request)
    {
        foreach ($this->list as $key => $item) {
            $inputQuan = $request->input('quantity'.$key);
            $itemQuan = $item['quantity'];
            $this->totalPrice += ($inputQuan - $itemQuan) * $item['product']->price;
            $item['quantity'] = $inputQuan;
            $item['price'] = $inputQuan * $item['product']->price;
            $this->list["$key"] = $item;
        }
    }

    public function delete($id)
    {
        if (array_key_exists($id,$this->list)) {
            $this->totalPrice = $this->list["$id"]['price'];
            unset($this->list["$id"]);
        }

    }
}
