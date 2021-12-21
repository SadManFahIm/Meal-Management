@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Add Meal</h1>
            </div>

            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Meal</li>
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
                            <div class="form-group">
                                <label for=""> Member :<span style="color:red;">*</span></label>
                                <select class="form-control" name="n_type_id" aria-label="Default select example" >

                                    <option value selected="1">Safin [UID-1]</option>
                                    <option value="2">Sadman [UID-2]</option>
                                    <option value="3">Rakib [UID-3]</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""> Breakfast Quantity :<span style="color:red;">*</span></label>
                                <select class="form-control" name="n_type_id" aria-label="Default select example" >

                                    <option value selected="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>

                                </select>
                            </div>
                        </div>
                    </div>                               {{--Row 1--}}


                    <div class="row mx-auto">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Lunch Quantity :<span style="color:red;">*</span></label>
                                            <select class="form-control" name="n_type_id" aria-label="Default select example" >

                                                <option value selected="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Dinner Quantity :<span style="color:red;">*</span></label>
                                            <select class="form-control" name="n_type_id" aria-label="Default select example" >

                                                <option value selected="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>

                                            </select>
                                        </div>
                                    </div>
                   </div>


                                <div class="row mx-auto">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="">Date:<span style="color:red;">*</span></label>
                                        <input type="date" class="form-control" name="s_dob" placeholder="Select Date of Birth" value="" id="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group ">
                                            <input type="submit" class="btn btn-success btn-block hover" value="Add" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    {{--Row 2--}}


                </form>
            </div>
        </div>
    </div>{{-- container for holding form--}}
</div> {{-- main container end --}}





@endsection
