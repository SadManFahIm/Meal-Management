<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use DB;

class StudentController extends Controller
{
    public function viewLogin(){                //view Login page
        return view('student.studentLogin');
    }

                                                 // verifyLogin

    public function verifyLogin (Request $req){

        $validatedData = $req->validate([
            'email' => 'required|email',
            'password' => 'required|max:25|min:2',
        ]);

        $email = $req ->email;
        $password = $req ->password;
        //DB::enableQueryLog();
        $user = DB::table('students')
                ->where('s_email',$email)
                ->where('s_password',$password)
                ->first();
               // dd(DB::getQueryLog());
        $status = $user->s_status;
        $sid=$user->sid;


        if ($user != null ){

            if ($status != 1){
                echo "Please Verify Your Email first";
            }

           else {
                $notification=array(
                    'messege'=>'Successfully Logged in',
                    'alert-type'=>'success'
                     );
                $req->session()->put('sid' , $sid);
                return redirect('student.dashboard');
                    }

        }
        else{
            $notification=array(
                'messege'=>'Something went wrong !',
                'alert-type'=>'error'
                 );
             return Redirect()->back()->with($notification);
        }

    }

                                                 // studentLogOut
    public function studentLogOut(){

        session()->forget('sid');
       return redirect('student.login');
    }

    public function viewDashboard(){
        return view('student.studentDashboard');

    }

    public function allNotice()
    {
        $all_notice=DB::table('notices')
        ->orderBy('n_id', 'desc')
        ->get();
        return view('student.studentNotice',['all_notice'=>$all_notice]);
    }

                                            //   class test result
   public function viewClassTestResult(){

    $sid=session()->get('sid');

    $user_info=DB::table('students')
    ->where('sid',$sid)
    ->first();

    $test_result = DB::table('results')
    ->join('subject_list','subject_list.subject_id','=','results.subject_id')
    ->join('teachers','teachers.t_id','=','results.t_id')
    ->select('results.*','subject_list.subject_name','subject_list.subject_code','teachers.t_name')
    ->where('results.slug','=',"test")
    ->where('results.sid','=',$sid)
    ->get();

   if($test_result==null){
      echo("No data Found....");

   }else{

    return view('student.studentClassTestResult',['user_info'=>$user_info,'test_result'=>$test_result]);

   }

//  return response()->json($test_result);

 }


                                         //  TERM EXAM RESULT

 public function viewTermResult(){

    $sid=session()->get('sid');

    $user_info=DB::table('students')
    ->where('sid',$sid)
    ->first();

                                      // QUERY
   $test_result = DB::table('results')
                ->join('subject_list','subject_list.subject_id','=','results.subject_id')
                ->join('teachers','teachers.t_id','=','results.t_id')
                ->select('results.*','subject_list.subject_name','subject_list.subject_code','teachers.t_name')
                ->where('results.slug','=',"term")
                ->where('results.sid','=',$sid)
                ->get();

   if($test_result==null){
      echo("No data Found....");

   }else{

    return view('student.studentTermResult',['user_info'=>$user_info,'test_result'=>$test_result]);

   }

//  return response()->json($test_result);

 }

 public function searchTest(Request $req){
        $exam_type_id=$req->exam_type_id;
        $sid=session()->get('sid');

        $user_info=DB::table('students')
        ->where('sid',$sid)
        ->first();

                                          // QUERY
       $test_result = DB::table('results')
                    ->join('subject_list','subject_list.subject_id','=','results.subject_id')
                    ->join('teachers','teachers.t_id','=','results.t_id')
                    ->select('results.*','subject_list.subject_name','subject_list.subject_code','teachers.t_name')
                    ->where('results.exam_type_id',$exam_type_id)
                    ->where('results.sid','=',$sid)
                    ->get();

       if($test_result==null){
          echo("No data Found....");

       }else{

        return view('student.searchTestResult',['user_info'=>$user_info,'test_result'=>$test_result]);

       }

 }


   public function viewUploadAssignment(){
       return view('student.uploadAssignment');
   }



 public function searchTerm(Request $req){
    $exam_type_id=$req->exam_type_id;
    $sid=session()->get('sid');

    $user_info=DB::table('students')
    ->where('sid',$sid)
    ->first();

                                      // QUERY
   $test_result = DB::table('results')
                ->join('subject_list','subject_list.subject_id','=','results.subject_id')
                ->join('teachers','teachers.t_id','=','results.t_id')
                ->select('results.*','subject_list.subject_name','subject_list.subject_code','teachers.t_name')
                ->where('results.exam_type_id',$exam_type_id)
                ->where('results.sid','=',$sid)
                ->get();

   if($test_result==null){
      echo("No data Found....");

   }else{

    return view('student.searchTermResult',['user_info'=>$user_info,'test_result'=>$test_result]);

   }

}
   public function uploadAssignment(Request $req)
   {

        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf,zip,rar,doc|max:2048',
        'subject_id'=>'required',
        't_id' =>'required'
        ]);

        $sid=session()->get('sid');
        $subject_id=$req->subject_id;
        $t_id=$req->t_id;

        $user_info=DB::table('students')
        ->select()
        ->where('sid',$sid)
        ->first();

        $data=array();
        $data['sid']=$sid;
        $data['subject_id']=$subject_id;
        $data['t_id']=$t_id;
        $data['s_class'] = $user_info->s_class;
        $data['timestamp']=date('Y-m-d H:i:s');

        if($req->file()){
             $filename =  $req->file('file')->getClientOriginalName();
             $req->file('file')->move(public_path('../public/S Assignment/'), $filename);
             $data['asign_file_path'] = $filename;


            DB::table('up_assignment')->insert($data);

            return back()
            ->with('success','File has been uploaded.');

        }

   }

}
