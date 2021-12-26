<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;
use Error;
use Illuminate\Validation\Rules\In;

class CoursesController extends Controller
{


    function CourseIndex(){
        return view('courses');
    }


    function getAllCourses(){
        $courseData = json_decode(CourseModel::get());
        return $courseData;
    }

    function addNewCourse(Request $request){
       $course_name =  $request->input('course_name');
       $course_des =  $request->input('course_des');
       $course_fee =  $request->input('course_fee');
       $course_totall_enroll =  $request->input('course_totall_enroll');
       $course_totall_class =  $request->input('course_totall_class');
       $course_link =  $request->input('course_link');
       $course_img =  $request->input('course_img');

       $addCoursResult = CourseModel::insert(['course_name'=>$course_name, 'course_des'=>$course_des, 'course_fee'=>$course_fee, 'course_totall_enroll'=>$course_totall_enroll, 'course_totall_class'=>$course_totall_class, 'course_link'=>$course_link, 'course_img'=>$course_img]);

       if( $addCoursResult==true){
           return 1;
       }else{
           return 0;
       }


    }



    function deleteCourse(Request $request){
        $id = $request->input('delete_id');

        $courseDeleteResult = CourseModel::where('id', '=', $id)->delete();

        if($courseDeleteResult==true){
            return 1;

        }else{
            return 0;
        }
    }




    function GetSingleCourseData(Request $request){
        $singleCourseId = $request->input('EditId');
        $singleCourseresult = CourseModel::where('id','=',$singleCourseId)->get();

        if( $singleCourseresult==true){
            return ( $singleCourseresult);
        }else{
            return 0;
        }
    }


    function UpdateCourse(Request $request){
        $id = $request->input('id');
        $course_name = $request->input('course_name');
        $course_des = $request->input('course_des');
         $course_fee = $request->input('course_fee');
         $course_totall_enroll = $request->input('course_totall_enroll');
        $course_totall_class = $request->input('course_totall_class');
        $course_link = $request->input('course_link');
        $course_img = $request->input('course_img');

        $updateResult = CourseModel::where('id', '=', $id)->update(['course_name'=>$course_name, 'course_des'=> $course_des,'course_fee'=>$course_fee, 'course_totall_enroll'=>$course_totall_enroll, 'course_totall_class'=>$course_totall_class, 'course_link'=>$course_link, 'course_img'=>$course_img ]);


        // 'course_fee'=>$course_fee, 'course_totall_enroll'=>$course_totall_enroll, 'course_totall_class'=>$course_totall_class, 'course_link'=>$course_link, 'course_img'=>$course_img

        if($updateResult==true){
            return 1;

        }else{
            return 0 ;
        }



    }















}
