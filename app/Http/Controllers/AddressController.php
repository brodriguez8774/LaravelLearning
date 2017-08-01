<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\Address;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
    /**
     * Index for all Addresses.
     */
    public function index() {
        $addresses = DB::table('addresses')->get();
        # Equivalent nmto:  $addresses = Address::all();

        return view('address/index', ['addresses' => $addresses]);
    }

    /**
     * Show details of an Address model.
     *
     * Uses route model binding instead of standard query.
     * (See edit for standard query.)
     */
    public function detail(Address $address) {
        return view('address/detail', ['address' => $address]);
    }

    /**
     * Create a new Address model.
     */
    public function create() {
        return view('address/create');
    }

    /**
     * Save the newly created Address model.
     */
    public function store(AddressRequest $request) {
        # Create and save new model using short syntax.
        # (See update for long syntax.)
        $address = Address::create(
            request(['zip', 'country', 'street', 'city', 'region'])
        );

        # Redirect to next page.
        return Redirect::action('AddressController@index');
    }

    /**
     * Edit a given Address model.
     *
     * Uses standard query instead of route model binding.
     * (See detail for route model binding.)
     */
    public function edit($id) {
        $address = DB::table('addresses')->where('id', $id)->first();
        return view('address/edit', ['address' => $address]);
    }

    /**
     * Update a given Address model.
     */
    public function update(AddressRequest $request, $id) {
        # Find and update model using long syntax.
        # (See store for short version.)
        $address = Address::where('id', $id)->firstOrFail();
        $address->street = $request->street;
        $address->city = $request->city;
        $address->region = $request->region;
        $address->zip = $request->zip;
        $address->country = $request->country;
        $address->save();

        # Redirect to next page.
        return Redirect::action('AddressController@index');
    }

    /**
     * Delete a given Address model.
     */
    public function delete(Request $request, $id) {
        # Select and delete model with given id.
        Address::where('id', $id)->delete();

        # Redirect to next page.
        return Redirect::action('AddressController@index');
    }
}
