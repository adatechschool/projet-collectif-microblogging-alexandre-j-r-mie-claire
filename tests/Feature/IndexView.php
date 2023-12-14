<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexView extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $users = User::factory(10)->create();

        // $this->actingAs($users);

        $bladeString = '<x-card-author :users="$Users" :post="$Posts" />';

        $view = $this->blade($bladeString, $users);

        $view->assertSee($users->name);
    }
}
