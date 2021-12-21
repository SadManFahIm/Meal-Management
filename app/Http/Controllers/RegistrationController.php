<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
//use Illuminate\Support\Facades\Validator;
use Validator;
//use App\Models\Permissions;
use DB;
use PDF;
use Session;
use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class RegistrationController extends Controller
{
   public function addStudent(Request $request){
    $validatedData=Validator::make($request->all(),[
                                's_name' => 'required|max:100',
                                's_email' => 'required|email|unique:students,s_email|max:60',
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
                                //'s_image' => 'required|max:1000',
                                's_phone'=>'max:20',
                                's_password'=>'max:30'
                        ],

                        [
                            'required' => 'This field can not be blank.',
                            's_email.unique' => 'This email has been used',
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


                            //$image=$request->file('s_image');
                            // $slider=$request->file('s_image');
                            // $filename = rand(111111, 999999);
                            // $extension = $slider->extension();
                            // $getFileExt = $filename + '.' +$extension;
                            // $slider->move(public_path('public/user Image/'), $getFileExt);
                            // $data['s_image'] = $getFileExt;



                            $filename =  $request->file('s_image')->getClientOriginalName();
                            $request->file('s_image')->move(public_path('../public/user Image/'), $filename);
                            $data['s_image']=$filename;



                                if($validatedData->fails())
                                {
                                   return Redirect::back()->withErrors($validatedData);
                                }

                                else
                               {
                                     $user="User added successfully";
                                     DB::table('students')->insert($data);
                                     return redirect('register.student.add')->withErrors($user);
                               }

                            // DB::table('stock_product_picture')->insert($stock_product_picture);



   }


   public function addTeacher(Request $request)
   {
                    $validatedData=Validator::make($request->all(),
                    [
                        't_name' => 'required|max:100',
                        't_email' => 'required|email|unique:teachers,t_email|max:60',
                        't_address' => 'required|max:255',
                        't_status' => 'required',
                        't_national_id' => 'required|max:255',
                        't_gender' => 'required',
                        't_dob' => 'required',
                        't_religion' =>'required',
                        't_phone'=>'max:20',
                        't_password'=>'max:20'

                    ],

                    [
                        'required' => 'This field can not be blank.',
                        't_email.unique' => 'This email has been used',
                        'max' => 'Enter less than max value.',
                        't_email.email'=>'Enter a valid email address',
                    //'mimes'=>'File type does not match',
                        //'s_image.max'=>'File size is too much bigger',

                    ]);

                    $data=array();
                    $data['t_name']=$request->t_name;
                    $data['t_email']=$request->t_email;
                    $data['t_address']=$request->t_address;
                    $data['t_status']=$request->t_status;
                    $data['t_national_id']=$request->t_national_id;
                    $data['t_gender']=$request->t_gender;
                    $data['t_dob']=$request->t_dob;
                    $data['t_religion']=$request->t_religion;
                    $data['timestamp']=date('Y-m-d H:i:s');
                    $data['t_phone']=$request->t_phone;
                    $data['t_password']=$request->t_password;

                     //profile image
                    $filename =  $request->file('t_image')->getClientOriginalName();
                    $request->file('t_image')->move(public_path('../public/user Image/'), $filename);
                    $data['t_image']=$filename;


                    //additional multiple attachment

                    $attachment=$request->file('t_file');
                    foreach($attachment as $file)
                    {
                       $att[]=$file->getClientOriginalName();
                       $file->move(public_path('../public/user File/'), $att);
                       $data['t_file']=$att;
                    }
                    //return response()->json($data);

                    if($validatedData->fails())
                    {
                       return Redirect::back()->withErrors($validatedData);
                    }

                    else
                   {
                         $user="Teacher Info added successfully";
                         DB::table('teachers')->insert($data);
                         return redirect('register.student.add')->withErrors($user);
                   }

   }
}
