<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AddNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAddNewsFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('title','123')
                    ->type('text','123')
                    ->press('#submit')
                    ->assertSee('Длина поля');
        });
    }

    public function testAddNewsSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                    ->type('title','NewsTest123')
                    ->type('text','NewsTest123NewsTest123NewsTest123')
                    ->select('category_id','1')
                    ->press('#submit')
                    ->assertSee('Новости');
        });
    }
}
