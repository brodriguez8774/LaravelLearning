<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use App\Models as models;

class AddressController extends Controller
{
    /**
     * Index for all Addresses.
     */
    public function index() {
        $addresses = DB::table('addresses')->get();

        return view('address/index', ['addresses' => $addresses]);
    }

    /**
     * Show details of an Address model.
     */
    public function detail($id) {
        $address = DB::table('addresses')->where('id', $id)->first();
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
        $address = new models\Address;
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
        $address = models\Address::where('id', $id)->firstOrFail();
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
        models\Address::where('id', $id)->delete();

        # Redirect to next page.
        return Redirect::action('AddressController@index');
    }
}
