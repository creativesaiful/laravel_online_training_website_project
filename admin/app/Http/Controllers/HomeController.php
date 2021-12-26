<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\CourseModel;
use App\ServicesModel;
use App\projectsModel;
use App\ContactModel;


class HomeController extends Controller
{
    function HomeIndex(){
        $totalVisitor = VisitorModel::count();
        $totalCourse = CourseModel::count();
       $totalService =  ServicesModel::count();
       $totalProject = projectsModel::count();
       $totalContact = ContactModel::count();


    return view('home',[
        'totalVisitor'=>$totalVisitor,
        'totalCourse'=>$totalCourse,
        'totalService'=>$totalService,
        'totalProject'=>$totalProject,
        'totalContact'=>$totalContact
    ]);
    }
}
