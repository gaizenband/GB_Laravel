<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEditNewsFail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/news/1/edit')
                    ->type('title','123')
                    ->type('text','123')
                    ->press('#submit')
                    ->assertSee('Длина поля');
        });
    }

    public function testEditNewsSuccess()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('admin/news/1/edit')
                    ->type('title','Новость 1')
                    ->type('text','А у нас новость 1 и она очень хорошая')
                    ->select('category_id','1')
                    ->press('#submit')
                    ->assertSee('Новости');
        });
    }
}
