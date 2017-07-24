<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Edit a given Address model.
     */
    public function edit($id) {
        $address = DB::table('addresses')->where('id', $id)->first();
        return view('address/edit', ['address' => $address]);
    }
}
