<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create 50 random Addresses using the Address factory class.
         * Saves to db.
         */
        factory(App\Models\Address::class, 50)->create();
    }
}
