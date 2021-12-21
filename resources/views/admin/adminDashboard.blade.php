@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="content">
            <div class="row">
                <div class="col-md-12 col-xs-11">

                    <div class="col-lg-2 col-xs-12 col bg-primary shadow menuContainer hover">
                        <a href="{{ URL::to('register.student.add') }}" class="menuLink text-decoration-none">Register User </a><br>
                        <i class="fa fa-cash-register"></i>

                    </div>


                    <div class="col-lg-2 col-xs-12 bg-success shadow menuContainer hover">
                        <a href="#" class="menuLink text-decoration-none">Meal Section</a> <br>
                        <i class="fa fa-calendar"></i>
                    </div>


                    <div class="col-lg-2 col-xs-12 bg-warning shadow menuContainer hover">
                        <a href="#" class="menuLink text-decoration-none">Bazar Section</a>
                    </div>

                    <div class="col-lg-2 col-xs-12 bg-secondary shadow menuContainer hover">
                        <a href="#" class="menuLink text-decoration-none">Details & Report</a>
                    </div>

                    {{-- <div class="col-lg-2 col-xs-12 bg-info shadow menuContainer hover">
                        <a href="#" class="menuLink text-decoration-none">Student List</a>
                    </div> --}}

                </div>
            </div>
    </div>
</div>
@endsection
