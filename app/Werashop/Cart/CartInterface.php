<?php


namespace App\Werashop\Cart;


interface CartInterface
{
    public function addItem(Buyable $item, $amount = 1);

    public function removeItem(int $id_in_cart);

    public function flush();

    public function getItems();

    public function getTotalCost();

    public function checkout();
}