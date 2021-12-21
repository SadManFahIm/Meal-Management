@extends('admin.layouts.adminSidebar')

@section('content')
<div class="page-wrapper">
            <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                                <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Register User</h1>

                                </div><!-- /.col -->
                                <div class="col-sm-8">
                                                            <!--Error message generate here -->
                                    @if ($errors->any())
                                        <div class="alert alert-success">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Register User</li>
                                </ol>
                                </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
            </div>
      <!-- /.content-header -->

      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#add_student">ADD MEMBER</a></li>

                    </ul>
                           {{-- student tab started from here  --}}
                    <div class="tab-content">
                        <div id="add_student" class="tab-pane fade in active">
                            <div class="card-header bg-success shadow-lg">
                                <h5 class="card-title m-0">
                                    ADD MEMBER
                                </h5>
                            </div>

                            <div class="card-body text-sm">

                                <form action="{{ URL::to('register/student')}}"  method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="">Name :<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" name="s_name" placeholder="Name" value="" id="">
                                        </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label for="">Email :<span style="color:red;">*</span></label>
                                            <input type="email" class="form-control" name="s_email" placeholder="Email" value="" id="" >
                                        </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Address :<span style="color:red;">*</span></label>
                                                <textarea class="form-control" name="s_address" ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender :<span style="color:red;">*</span></label>
                                                <select class="form-control" name="s_gender" aria-label="Default select example" >
                                                    <option selected value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="others">Others</option>
                                                </select>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="">Contact No :<span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" name="s_phone" placeholder="Student Phone No" value="" id="">
                                            </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <input type="submit" class="btn btn-success btn-block hover" value="Confirm" >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
            </div>
        </div>
    </section>


</div>  <!-- Page wrapper -->
@endsection
