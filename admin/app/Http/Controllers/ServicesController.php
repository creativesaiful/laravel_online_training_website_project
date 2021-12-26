<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesModel;

class ServicesController extends Controller
{


    function ServicesIndex()
    {



        return view('services');
    }

    function getServiceData()
    {
        $serviceData = json_encode(ServicesModel::all());
        return $serviceData;
    }

    function deleteServicesData(Request $request)
    {
        $id = $request->input('id');
        $delStatus = ServicesModel::where('id', '=', $id)->delete();


        if ($delStatus == true) {
            return 1;
        } else {
            return 0;
        }
    }


    function getSingleServiceData(Request $request)
    {
        $id = $request->input('id');
        $serviceData = json_encode(ServicesModel::where('id', '=', $id)->get());
        return $serviceData;
    }


    function updateservice(Request $request){
        $id = $request->input('id');
        $service_img = $request->input('service_img');
        $service_name = $request->input('service_name');
        $service_des = $request->input('service_des');

        $updateResult = ServicesModel::where('id', '=', $id)->update(['service_name'=>$service_name, 'service_des'=>$service_des, 'service_img'=>$service_img]);

        if($updateResult==true){
            return 1;
        }else{
            return 0;
        }


    }


    function addService(Request $request){
        $service_name = $request->input('service_name');
        $service_des = $request->input('service_des');
        $service_img = $request->input('service_img');
       $addResult =  ServicesModel::insert(['service_name'=>$service_name, 'service_des'=>$service_des, 'service_img'=>$service_img]);

       if($addResult==true){
           return 1;
       }else{
           return 0;
       }


    }






}
