@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Notices</h1>
            </div> 
            
            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Notice</li>
                </ol>
            </div>
        </div>                                         {{-- page top title header --}}
        
        <div class="row">
            <div class="card-body text-sm">
                 
                <form action="{{ URL::to('notice/add')}}"  method="post" enctype="multipart/form-data">
                    @csrf
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

                    <div class="row mx-auto">
                        <div class="col-sm-4">
                            <div class="form-group ">
                                <label for="">Notice Title :<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="n_title" value="" id="">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Notice Type :<span style="color:red;">*</span></label>
                                <select class="form-control" name="n_type_id" aria-label="Default select example" >
                                    <option selected value="1">All</option>
                                    <option value="2">Students</option>
                                    <option value="3">Teacher</option>
                                </select>
                            </div>
                        </div>
                    </div>                               {{--Row 1--}}
                    

                    <div class="row mx-auto">
                        <div class="col-sm-8">
                            <div class="form-group ">
                                <label for=""> Notice Description :<span style="color:red;">*</span></label>
                                <textarea class="form-control" name="n_description" ></textarea>
                            </div>
                        </div>
                    </div>    {{--Row 2--}}

                    <div class="row">
                        <div class="col-md-4 ">
                            <div class="form-group">
                            <input type="file" class="image" name="n_image" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block hover" value="Confirm" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}

@endsection