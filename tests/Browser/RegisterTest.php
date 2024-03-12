<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUserCanRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/register')
                ->type('name', 'Alinut')
                ->type('email', 'cret@yahoo.com')
                ->type('password', 'testtestare')
                ->type('password_confirmation', 'testtestare')
                ->press('Register');
            $browser->clickLink('Alinut');
            $browser->clickLink('Logout');
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'cret@yahoo.com')
                ->type('password', 'testtestare')
                ->press('Login');
        });
    }

}
