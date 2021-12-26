<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhotoTableModel;

class photoGalaryController extends Controller
{
    function photoGallary(){
        return view('/photo');
    }

    function uploadPhoto(Request $request){
        $fath = $request->file('photo')->store('public');

        $imgName = explode('/', $fath)[1];

       $host =  $_SERVER['HTTP_HOST'];
       $storPath = "http://".$host."/storage/".$imgName;
       $uplaodResult = PhotoTableModel::insert(['photo_location'=>$storPath]);

       if( $uplaodResult==true){
           return 1;
       }else{
           return 0;
       }

    }
}
