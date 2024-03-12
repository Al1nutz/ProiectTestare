<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Test user login with given credentials.
     *
     * @return void
     */
    public function testUserCanLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/login')
                ->type('email', 'alincret02@gmail.com')
                ->type('password', 'testtestare')
                ->press('Login');
        });
    }
}
