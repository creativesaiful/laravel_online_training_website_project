<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class VisitorController extends Controller
{
    function VisitorData(){

       $visitors = json_decode( VisitorModel::orderBy('id', 'desc')->take(500)->get());

      return view('visitor', ['visitors'=>$visitors]);
    }
}
