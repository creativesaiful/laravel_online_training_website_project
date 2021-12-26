<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class privacyController extends Controller
{
    function privacyPage(){
        return view("/privacy");
    }
}
