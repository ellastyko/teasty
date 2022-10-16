<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LandingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('landing.landing');
    }
}
