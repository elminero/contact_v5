<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subdivision;

class SubdivisionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSubdivisionsByCountryCode($county_code)
    {
        $subdivision = new Subdivision;
        $subdivisions = $subdivision->where('country_code', $county_code)->pluck("subdivision");

        return json_encode($subdivisions);
    }
}
