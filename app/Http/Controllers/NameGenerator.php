<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameGenerator extends Controller
{
    /**
     * Index.
     */
    public function index($number)
    {
        $names = [];
        //$index = 0;
        //while ($index < $number) {
            //$index++;
        for ($index = 0; $index < $number; $index++) {
            $names[] = factory(\App\Models\Name::class)->make();
        }
        //dd($names);
        return view("nameGenerator")
            ->with("names", $names);
    }
}
