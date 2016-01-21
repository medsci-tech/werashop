<?php


namespace App\Werashop\Cart;

use Carbon\Carbon;

class SessionDrivenCart implements CartInterface
{
    /**
     * @var \Illuminate\Support\Collection
     */
    private $_items;
    private $_totalPrice;
    private $_nextId;
    /**
     * SessionDrivenCart constructor.
     */
    private function __construct()
    {
        $this->_items = collect();
        $this->_totalPrice = 0.00;
        $this->_nextId = 0;
    }

    public static function getInstance()
    {
        if (!\Session::has('cart')) {
            return new static;
        }

        return \Session::get('cart');
    }

    public function addItem(Buyable $item, $amount = 1)
    {
        $this->_items->push([
            $this->_nextId => [
                'add_time' => Carbon::now()->getTimestamp(),
                'amount' => $amount,
                'buyable' => [
                    'identifer' => $item->getIdentifer(),
                    'name' => $item->getName(),
                    'price' => $item->getPrice(),
                    'image_set' => $item->getImageSet()
                ]
            ]
        ]);

        $this->_nextId ++;
        $this->_totalPrice += $item->getPrice() * $amount;

        return $this;
    }

    public function removeItem(int $id_in_cart)
    {
        $item = $this->_items->pull($id_in_cart);
        $this->_totalPrice -= $item['buyable']['price'];

        return $item;
    }

    public function flush()
    {
        $this->_items = collect();
        $this->_nextId = 0;
        $this->_totalPrice = 0.00;

        return $this;
    }

    public function getItems()
    {
        return $this->_items;
    }

    public function getTotalCost()
    {
        return $this->_totalPrice;
    }

    public function checkout()
    {
        return "check me out";
        // TODO: Implement checkout() method.
    }
}