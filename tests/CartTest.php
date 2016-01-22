<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Werashop\Cart\Cartinterface;

class CartTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCartConstruction()
    {
        $cart = Cart::getFacadeRoot();

        $this->assertNotNull($cart);
        $this->assertInstanceOf(Cartinterface::class, $cart);

        $cart2 = Cart::getFacadeRoot();
        $this->assertSame($cart, $cart2);
        $this->assertTrue($cart2 === $cart);
    }

    public function testAddItem()
    {
        $item = \App\Models\Commodity::find(1);
        $item2 = \App\Models\Commodity::find(2);
        Cart::addItem($item);
        $this->assertEquals(Cart::getItems()->count(), 1);
        $this->assertEquals(Cart::getTotalCost(), $item->getPrice());

        Cart::removeItemsById($item->getIdentifer());
        $this->assertEquals(Cart::getItems()->count(), 0);
        $this->assertEquals(Cart::getTotalCost(), 0);

        Cart::addItem($item);
        Cart::addItem($item2);
        Cart::addItem($item);
        $this->assertEquals(Cart::getItems()->count(), 2);
        $this->assertEquals(Cart::getTotalCost(), $item->getPrice() * 2 + $item2->getPrice());

        Cart::removeItems(['name' => $item->getName()]);
        $this->assertEquals(Cart::getItems()->count(), 1);
        $this->assertEquals(Cart::getTotalCost(), $item2->getPrice());
    }
}
