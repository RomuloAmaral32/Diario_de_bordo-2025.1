<?php

namespace App\Controllers;

use App\Core\App;
use Exception;

class LandingController{

    public function index()
    {
        return view('site/landing_page');
    }
}