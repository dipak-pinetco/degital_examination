<?php

namespace Tests\Browser;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /** @test */
    public function check_base_path()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Take control of your')
                ->assertSeeLink('Sign in')
                ->assertSeeLink('Sign up')
                ->pause(1);
        });
    }

    /** @test */
    public function check_and_register_admin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Sign up')
                ->assertSee('School')
                ->select('school_id', 1)
                ->select('role', 'admin')

                ->assertSeeLink('Already registered?')
                ->assertSee('REGISTER')
                ->type('first_name', 'Dipak')
                ->type('last_name', 'Gavali')
                ->type('email', 'dipak@gmail.com')
                ->type('mobile', '+91 9173921432')
                ->fillDate('input[name=date_of_birth]', Carbon::now()->subYears(6))
                ->type('password','password')
                ->type('password_confirmation','password')
                ->press('REGISTER')
                ->pause(10000);
        });
    }
}
