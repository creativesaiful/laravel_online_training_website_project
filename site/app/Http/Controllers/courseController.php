<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class courseController extends Controller
{
  function coursePage(){
    $coursesdata = CourseModel::orderBy('id', 'desc')->get();
      return view("/course",['coursesdata'=>$coursesdata]);
  }
}
