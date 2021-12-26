<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\projectsModel;

class ProjectController extends Controller
{
    function projectIndex(){
        return view('project');
    }

    function getAllProject(){
        $porjectdata = json_decode(projectsModel::orderBy('id', 'desc')->get());

        return $porjectdata;
    }

    function addNewProject(Request $request){
        $project_name = $request->input('project_name');
        $project_des = $request->input('project_des');
        $project_link = $request->input('project_link');
        $project_img = $request->input('project_img');

        $projectResult = projectsModel::insert(['project_name'=>$project_name, 'project_des'=>$project_des, 'project_link'=>$project_link, 'project_img'=>$project_img]);


        if($projectResult==true){
            return 1;
        }else{
            return 0;
        }



    }





    function getSingleProject(Request $request){
        $id = $request->input('id');

        $singelProjectresult = projectsModel::where('id','=',$id)->get();

        if($singelProjectresult==true){
            return $singelProjectresult;
        }

    }


    function updateProject(Request $request){
        $id = $request->input('id');
       $project_name = $request->input('project_name');
       $project_des = $request->input('project_des');
       $project_link = $request->input('project_link');
       $project_img = $request->input('project_img');

      $ProjectupdateResult = projectsModel::where('id','=',$id)->update(['project_name'=>$project_name, 'project_des'=>$project_des, 'project_link'=>$project_link, 'project_img'=>$project_img ]);

        if($ProjectupdateResult ==true){
            return 1;
        }else{
            return 0;
        }



    }



    function DeleteProject(Request $request){
        $id = $request->input('id');
       $deleteResult =  projectsModel::where('id','=', $id)->delete();

       if( $deleteResult==true){
           return 1;
       }else{
           return 0;
       }
    }




}
