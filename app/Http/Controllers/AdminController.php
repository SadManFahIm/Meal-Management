<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;

class AdminController extends Controller
{
    public function viewAdminDashboard ()
    {
        return view('admin.adminDashboard');
    }

    public function registerView()
    {
        return view ('admin.registerStudent');

    }


    public function viewStudentList(){
        $all_student = DB::table('students')
                     ->get();

        return view('admin.studentList',['all_student'=>$all_student]);
    }


    public function viewTeacherList(){
        $all_teacher = DB::table('teachers')
                     ->get();

        return view('admin.teacherList',['all_teacher'=>$all_teacher]);



    }


    public function studentDetails($sid){
        $s_id = base64_decode($sid);

        $s_details=DB::table('students')
                  ->where('sid',$s_id)
                  ->first();
                 // return response()->json($s_details);
                 return view('admin.viewStudentDetails',['s_details'=>$s_details]);

    }



    public function editStudentDetails(Request $request ,$sid)
    {
        $validatedData=Validator::make($request->all(),[
            's_name' => 'required|max:100',
            's_email' => 'required|email|max:60',
            's_address' => 'required|max:255',
            's_class' => 'required',
            's_status' => 'required',
            's_father_name' => 'required|max:50',
            's_mother_name' => 'required|max:50',
            's_birth_certificate_no' => 'required|max:255',
            's_gender' => 'required',
            's_gurdian'=> 'required|max:30',
            's_gurdian_phone' => 'required|max:12',
            's_dob' => 'required',
            's_religion' => 'required',
            's_phone'=>'max:20',
            's_password'=>'max:30'
    ],

    [
        'required' => 'This field can not be blank.',
        'max' => 'Enter less than max value.',
        's_email.email'=>'Enter a valid email address',
       //'mimes'=>'File type does not match',
        //'s_image.max'=>'File size is too much bigger',

    ]);

    $data =array();

        $data['s_name']=$request->s_name;
        $data['s_email']=$request->s_email;
        $data['s_address']=$request->s_address;
        $data['s_class']=$request->s_class;
        $data['s_status']=$request->s_status;
        $data['s_father_name']=$request->s_father_name;
        $data['s_mother_name']=$request->s_mother_name;
        $data['s_birth_certificate_no']=$request->s_birth_certificate_no;
        $data['s_gender']=$request->s_gender;
        $data['s_gurdian']=$request->s_gurdian;
        $data['s_gurdian_phone']=$request->s_gurdian_phone;
        $data['s_dob']=$request->s_dob;
        $data['s_religion']=$request->s_religion;
        $data['timestamp']=date('Y-m-d H:i:s');
        $data['s_phone']=$request->s_phone;
        $data['s_password']=$request->s_password;

         //return response()->json($data);

            if($validatedData->fails())
            {
               return Redirect::back()->withErrors($validatedData);
            }

            else
           {
               $s_details=DB::table('students')
               ->where('sid',$sid)
               ->first();

                 $user="Student's details updated  successfully";
                 DB::table('students')
                 ->where('sid',$sid)
                 ->update($data);
                 return view('admin.viewStudentDetails',['s_details'=>$s_details])->withErrors($user);
           }

    }


    public function viewAddMeal(){
        return view('admin.addMeal');
    }





}


