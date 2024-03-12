<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CheckoutTest extends DuskTestCase
{
    /**
     * Test add to cart and checkout feature for a random product.
     *
     * @return void
     */
    public function testUserCanCheckout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000')
                ->click('#cartDropdown')
                ->waitForText('View cart')
                ->clickLink('View cart')
                ->waitForLocation('http://127.0.0.1:8000/login')
                ->type('email', 'alincret02@gmail.com')
                ->type('password', 'testtestare')
                ->press('Login')
                ->waitForLocation('http://127.0.0.1:8000/cart');
        });
    }
}
