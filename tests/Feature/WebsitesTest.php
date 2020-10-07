<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebsitesTest extends TestCase
{
    /**
     * Assert the index method of the website controller
     * response with the four items available.
     *
     * @return void
     */
    use \Illuminate\Foundation\Testing\DatabaseMigrations;

    public function testAll()
    {
        $response = $this->get('/api/websites');
        $response->assertStatus(200)->assertJsonCount(4);
    }
}
