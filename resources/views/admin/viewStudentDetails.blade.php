@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="main">
            <div class="row">
                <div class="col-md-4">

                        <div class="card" style="background-color: #e1e5ea">
                            <img src="{{url('../user Image/'.$s_details->s_image)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Student Details</h5>
                            <h3>Name:{{$s_details->s_name}}</h3>
                            <h4>Email:{{$s_details->s_email}}</h4>
                            <h4>Gurdian:{{$s_details->s_gurdian}}</h4>
                            <h4>Gurdian Phone:{{$s_details->s_gurdian_phone}}</h4>
                            </div>
                        </div>

                </div>


                <div class="col-lg-8">

                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-success">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card" style="background-color: #e1e5ea">
                        <form action="{{URL::to('student/details/edit/post/'.$s_details->sid)}}"  method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- row1 --}}

                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Student Name :<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_name" value="{{$s_details->s_name}}" id="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Student Email :<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_email" value="{{$s_details->s_email}}" id="">
                                    </div>
                                </div>
                            </div>

                            {{-- row2 --}}

                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for=""> Student Address:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_address" value="{{$s_details->s_address}}" id="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Class:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_class" value="{{$s_details->s_class}}" id="">
                                    </div>
                                </div>
                            </div>



                             {{-- row 3 --}}

                             <div class="row mx-auto">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="s_status" aria-label="Default select example" >
                                            @if ($s_details->s_status==1)
                                            <option selected value="1">Active</option>
                                            <option value="2">Inactive</option>
                                            @else
                                            <option selected value="2">Inactive</option>
                                            <option  value="1">Active</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Birth Certificate No:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_birth_certificate_no" value="{{$s_details->s_birth_certificate_no}}" id="">
                                    </div>
                                </div>
                            </div>


                             {{-- row 4 --}}

                             <div class="row mx-auto">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Gender :<span style="color:red;">*</span></label>
                                        <select class="form-control" name="s_gender" aria-label="Default select example" >
                                            @if ($s_details->s_gender=="male")
                                            <option selected value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                            @elseif ($s_details->s_gender=="female")
                                            <option  value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>
                                            @else
                                            <option  value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option selected  value="others">Others</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Father's Name:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_father_name" value="{{$s_details->s_father_name}}" id="">
                                    </div>
                                </div>
                            </div>



                             {{-- row 5 --}}

                             <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Mother's Name:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_mother_name" value="{{$s_details->s_mother_name}}" id="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Student's Gurdian Name:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_gurdian" value="{{$s_details->s_gurdian}}" id="">
                                    </div>
                                </div>
                            </div>



                             {{-- row 6 --}}

                             <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Student's Phone:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_phone" value="{{$s_details->s_phone}}" id="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Student's Gurdian Phone:<span style="color:red;">*</span></label>
                                        <input type="text" class="form-control" name="s_gurdian_phone" value="{{$s_details->s_gurdian_phone}}" id="">
                                    </div>
                                </div>
                            </div>


                            {{-- row 7 --}}


                                <div class="row mx-auto">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Religion :<span style="color:red;">*</span></label>
                                            <select class="form-control" name="s_religion" aria-label="Default select example" >
                                                @if ($s_details->s_religion=="islam")
                                                <option selected value="islam">Muslim</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddish">Busddish</option>
                                                <option value="cristian">Cristian</option>
                                                @elseif ($s_details->s_religion=="hindu")
                                                <option  value="islam">Muslim</option>
                                                <option selected value="hindu">Hindu</option>
                                                <option value="buddish">Busddish</option>
                                                <option value="cristian">Cristian</option>
                                                @elseif($s_details->s_religion=="buddish")
                                                <option  value="islam">Muslim</option>
                                                <option value="hindu">Hindu</option>
                                                <option  selected value="buddish">Busddish</option>
                                                <option value="cristian">Cristian</option>
                                                @else
                                                <option value="islam">Muslim</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddish">Busddish</option>
                                                <option selected value="cristian">Cristian</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Student's Password:<span style="color:red;">*</span></label>
                                        <input type="password" class="form-control" name="s_password" value="{{$s_details->s_password}}" id="myInput">
                                        <input type="checkbox" onclick="show_password()">Show Password

                                    </div>
                                </div>
                            </div>

                            {{-- row 8 --}}

                            <div class="row mx-auto">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="">Date of Birth:<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control" name="s_dob" value="{{$s_details->s_dob}}" id="">
                                    </div>
                                </div>
                            </div>


                            <div class="row mx-auto">
                                <div class="col-md-5 mx-auto">
                                    <div class="form-group ">
                                    <input type="submit" class="btn btn-success btn-block hover" value="Confirm" >
                                    </div>
                                </div>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}

<script>
    function show_password() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

@endsection
