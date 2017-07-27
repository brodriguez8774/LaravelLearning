<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/*
 * Unit Test - A test from the programmer's perspective.
 *
 * Equivalent to a building inspector looking at a new house.
 * He will look at specific individual systems (foundation, framing, electrical)
 * to make sure that it all meets code and individually works as expected.
 */
class AddressTest extends TestCase
{
    /**
     * Would normally put any unit tests here.
     *
     * But this project is small enough that there isn't really anything to
     * test here. Any tests would be things like making sure the database works, and
     * that the ModelFactory functions as intended.
     *
     * However, it's bad practice/unnecessary to test parts of code that are built
     * into the framework you're using. That should already be done by the framework developers.
     */
    public function test_dummy_test() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
