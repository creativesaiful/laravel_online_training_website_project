<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usertableModel;

class userController extends Controller
{
    function LoginPage(){
        return view('/login');

    }


    function onlogin(Request $request){
        $userEmail= $request->input('userEmail');
        $userPass = $request->input('userPass');





        $useCount = usertableModel::where('email', '=', $userEmail)->where('password','=',$userPass)->count();

        if($useCount==1){
            $request->session()->put('userEmail',$userEmail);
            return redirect('/');
        }else{
            return redirect('/login');
        };

    }



    function onlogout(Request $request){
        $request->session()->flush();
        return redirect('/login');
    }




}
