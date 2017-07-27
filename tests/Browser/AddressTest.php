<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\Models as models;

/*
 * Browser Tests - A test with a real browser.
 *
 * An attempt at real-world usage simulation.
 */
class AddressTest extends DuskTestCase
{
    # Have database reset after every test (via dropping table and re-migrating).
    use DatabaseMigrations;

    /**
     * Initial setup.
     *
     * Is run at the start of all other tests functions in this class.
     */
    public function setUp()
    {
        #factory(models\Address::class, 50)->create();
        return parent::setUp();
    }

    /**
     * Pre-populate database.
     */
    public function populate_data() {
        factory(models\Address::class)->create([
            'street' => '1234 Test Street',
            'city' => 'Test City',
            'region' => 'Test Region',
            'zip' => '12345',
            'country' => 'Test Country',
        ]);
    }

    /*
     * Test Home view to Address Index.
     */
    public function test_address_index() {
        # Test in browser.
        $this->browse(function (Browser $browser) {
            $browser->visit('/laravellearning/')
                    ->clickLink('Addresses')
                    ->waitForLocation('/laravellearning/address')
                    ->assertSee('Address Index');
        });
    }

    /**
     * Test Address Index through Address Creation.
     */
    public function test_address_creation() {
        # Test in browser.
        $this->browse(function (Browser $browser) {
            $browser->visit('/laravellearning/address')
                    ->clickLink('Create New Address')
                    ->waitForLocation('/laravellearning/address/create')
                    ->assertSee('Create New Address')
                    ->assertVisible('button')
                    ->type('street', '1234 Test Street')
                    ->type('city', 'Test City')
                    ->type('region', 'Test Region')
                    ->type('zip', '12345')
                    ->type('country', 'Test Country')
                    ->press('Submit')
                    ->waitForText('Address Index')
                    ->assertSeeLink('1234 Test Street Test City, Test Region, 12345');
        });
    }

    /**
     * Test Address Index to Address Detail.
     */
    public function test_address_detail() {
        $this->populate_data();

        # Test in browser.
         $this->browse(function (Browser $browser) {
            $browser->visit('/laravellearning/address')
                    ->clickLink('1234 Test Street Test City, Test Region, 12345')
                    ->waitForLocation('/laravellearning/address/1')
                    ->assertSee('Address Detail')
                    ->assertSee('1234 Test Street');
         });
    }

    /**
     * Test Address Detail through Address Edit.
     */
    public function test_address_edit() {
        $this->populate_data();

        # Test in browser.
        $this->browse(function (Browser $browser) {
            $browser->visit('/laravellearning/address/1')
                    ->clickLink('Edit Address')
                    ->waitforLocation('/laravellearning/address/edit/1')
                    ->assertSee('Edit Address')
                    ->type('street', '12345 Test Street')
                    ->press('Submit')
                    ->waitForLocation('/laravellearning/address')
                    ->assertSeeLink('12345 Test Street Test City, Test Region, 12345');
        });
    }

    /**
     * Test Address Detail through Address Delete.
     */
    public function test_address_delete() {
        $this->populate_data();

        # Test in browser.
        $this->browse(function (Browser $browser) {
            $browser->visit('/laravellearning/address/edit/1')
                    ->press('Delete')
                    ->assertPathIs('/laravellearning/address')
                    ->assertDontSeeLink('1234 Test Street Test City, Test Region, 12345');
        });
    }
}
