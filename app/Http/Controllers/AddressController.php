<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models\Address;

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
    public function store(Request $request) {
        # Validate provided fields. Return to form if validation fails.
        $this->validate($request, [
            'street' => 'bail|required|max:255',
            'city' => 'bail|required|max:255',
            'region' => 'bail|required|max:255',
            'zip' => 'required',
            'country' => 'bail|required|max:255'
        ]);

        # Create and save new model using form fields.
        $address = new Address;
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
    public function update(Request $request, $id) {
        $this->validate($request, [
            'street' => 'bail|required|max:255',
            'city' => 'bail|required|max:255',
            'region' => 'bail|required|max:255',
            'zip' => 'required',
            'country' => 'bail|required|max:255'
        ]);

        # Find and update model using form fields.
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
