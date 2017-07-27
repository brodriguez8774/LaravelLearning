<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models as models;

/**
 * Feature/Functional Test - A test from the user's perspective.
 *
 * Equivalent to a homeowner looking at a new house.
 * He will likely assume that the individual features work as intended,
 * and will instead focus on what it's like to live there. IE: How it looks,
 * how it feels, does it fit their needs, etc.
 */
class AddressTest extends TestCase
{
    /**
     * Initial set up.
     *
     * Is run at the start of all other test functions in this class.
     */
    public function setUp() {
        factory(models\Address::class, 50)->create();
    }

    /**
     * Test Url of Address Index.
     */
    public function test_addressUrl_index() {
        $response = $this->get('/address/');
        $response ->assertStatus(200);
    }

    /**
     * Test Url of Address Create.
     */
    public function test_addressUrl_create() {
        $response = $this->get('/address/create');
        $response ->assertStatus(200);
    }

    /**
     * Test Url of Address Detail.
     */
    public function test_addressUrl_detail() {
        $response = $this->get('/address/1');
        $response ->assertStatus(200);
    }

    /**
     * Test Url of Address Edit.
     */
    public function test_addressUrl_edit() {
        $response = $this->get('/address/edit/1');
        $response ->assertStatus(200);
    }
}
