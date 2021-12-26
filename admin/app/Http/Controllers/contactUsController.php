<?php

namespace App\Http\Controllers;
use App\ContactModel;
use Illuminate\Http\Request;

class contactUsController extends Controller
{
   function ContactIndex(){
       return view('/message');
   }



   function contactUsMessages(){
    $contactResult = json_decode(ContactModel::orderBy('id', 'desc')->get());

    if($contactResult==true){
        return $contactResult;
    }
   }



   function deletecontactUsMessages(Request $request){
   $id =  $request->input('id');

   $deleteMsgResult = ContactModel::where('id','=',$id)->delete();

   if( $deleteMsgResult==true){
       return 1;
   }else{
       return 0;
   }

    }


}
