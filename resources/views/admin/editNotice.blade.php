@extends('admin.layouts.adminSidebar')

@section('content')

<div class="page-wrapper">
    <div class="container-fluid">

        <div class="row mx-auto">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">
                  Edit Notices</h1>
            </div>

            <div class="col-sm-6 ">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Notice</li>
                </ol>
            </div>
        </div>                                         {{-- page top title header --}}

        <div class="row">
            <div class="card-body text-sm">

                <form action="{{ URL::to('notice/edit/post/'.$data->n_id)}}"  method="post" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="n_title" value="{{$data->n_title}}" id="">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="">Notice Type :<span style="color:red;">*</span></label>
                                <select class="form-control" name="n_type_id" aria-label="Default select example" >
                                @if($data->n_type_id == 1)
                                    <option selected value="{{$data->n_type_id}}">All</option>
                                    <option value="2">Students</option>
                                    <option value="3">Teacher</option>
                                    @elseif($data->n_type_id==2)
                                    <option selected value="{{$data->n_type_id}}">Students</option>
                                    <option value="1">All</option>
                                    <option value="3">Teacher</option>
                                    @elseif($data->n_type_id==3)
                                    <option selected value="{{$data->n_type_id}}">Teacher</option>
                                    <option value="1">All</option>
                                    <option value="2">Student</option>
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>                               {{--Row 1--}}


                    <div class="row mx-auto">
                        <div class="col-sm-8">
                            <div class="form-group ">
                                <label for=""> Notice Description :<span style="color:red;">*</span></label>
                                <input class="form-control" name="n_description" value="{{$data->n_description}}">
                            </div>
                        </div>
                    </div>    {{--Row 2--}}

                    <div class="row">
                        <div class="col-md-4 ">
                            <img src="{{asset('../notice Image/'.$data->n_image)}}"  class="img-thumbnail" id="profile_image" alt="Avatar" width="450" height="300">
                            <input type="file" name="n_image" id="profile_img" onchange="readURL(this);" value="{{$data->n_image}}" class="py-4">
                         <script>
                             function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#profile_image')
                                            .attr('src', e.target.result)
                                            .width(150)
                                            .height(200);
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }

                        </script>
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
