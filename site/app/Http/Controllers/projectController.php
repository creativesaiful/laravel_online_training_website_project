<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectModel;

class projectController extends Controller
{
    function projectPage(){
        $projectData = ProjectModel::orderBy('id', 'desc')->get();
        return view('/project',['projectData'=> $projectData]);
    }
}
