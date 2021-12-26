<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
use App\ServicesModel;
use App\CourseModel;
use App\ProjectModel;
use App\ContactModel;
use Dotenv\Store\File\Reader;

class HomeController extends Controller
{
    function HomeIndex()
    {

        $ip_address = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $date =  date('Y/m/d H:i:s A');

        VisitorModel::insert(['ip_address' => $ip_address, 'visit_time' => $date]);

        $servicesData = json_decode(ServicesModel::all());
        $coursesdata = CourseModel::orderBy('id', 'desc')->limit(6)->get();
        $projectData = ProjectModel::orderBy('id', 'desc')->limit(8)->get();

        return view(
            'home',
            [
                'servicesData' => $servicesData,
                'coursesdata' => $coursesdata,
               'projectdata'=> $projectData
            ]


        );
    }


    function contactMassageSend(Request $request){
        $contactName = $request->input('contactName');
        $contactMobile = $request->input('contactMobile');
        $contactEmail = $request->input('contactEmail');
        $contactMessage = $request->input('contactMessage');

        $contacResult = ContactModel::insert([
            'name'=>$contactName,
            'mobile'=>$contactMobile,
            'email'=>$contactEmail,
            'massage'=> $contactMessage
        ]);

        if( $contacResult==true){
            return 1;
        }else{
            return 0;
        }
    }




}
