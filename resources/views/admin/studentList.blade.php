@extends('admin.layouts.adminSidebar')
@section('content')

 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">
                 <h1 class="page-title">Student List</h1>
             </div>
             <div class="col-sm-8 col-9 text-right m-b-20">
                 <a href="{{ URL::to('register.student.add') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Student</a>
                 <a href="{{ URL::to('studentlist.pdf') }}" class="btn btn-danger float-right btn-rounded"><i class="fa fa-file-pdf-o" style="color:white"></i> Print Report</a>
             </div>
         </div>
         <form action="" method="">
         <div class="row filter-row">

             <div class="col-sm-6 col-md-3">
                 <div class="form-group form-focus">
                     <label class="focus-label">Student ID / Student Name</label>
                     <input type="text" class="form-control floating" name="search" id="search">
                 </div>
             </div>

             <div class="col-sm-6 col-md-3">
                <button formaction="" class="btn btn-success btn-block">Search</button>
             </div>
         </div>
         </form>

         <div class="row">
             <div class="col-md-12">
                 <div class="table-responsive">
                     <table class="table table-bordered table-hover">
                         <thead>
                             <tr>

                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Class</th>
                                <th>Status</th>
                                <th>Gurdian Name</th>
                                <th>Gurdian Phone</th>
                                <th>Image</th>
                                <th>Action</th>

                             </tr>
                         </thead>
                         <tbody>

                            @foreach($all_student as $data)


                              <tr>

                                  <td>{{$data->sid}}</td>
                                  <td>{{$data->s_name}}</td>
                                  <td>{{$data->s_email}}</td>
                                  <td>{{$data->s_address}}</td>
                                  <td>{{$data->s_class}}</td>
                                  @if($data->s_status==1)
                                      <td style="color: green"><b>Active</b></td>
                                  @elseif($data->s_status==0)
                                      <td style="color: red"><b>Inactive</b></td>

                                  @endif
                                  <td>{{$data->s_gurdian}}</td>
                                  <td>{{$data->s_gurdian_phone}}</td>
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../user Image/'.$data->s_image)}}" alt="No Image"></td>






                                 <td class="text-right">
                                    <a href="{{ URL::to('student/details/'.base64_encode($data->sid)) }}" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Details and Edit</a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i>Delete</a>
                                 </td>


                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>

             <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                <script type="text/javascript">
                    $('#search').on('keyup',function(){
                    $value=$(this).val();
                    console.log($value);
                    $.ajax({
                    type : 'get',
                    url : '{{route('notice.search')}}',
                    data:{'search':$value},
                    success:function(data){
                    console.log(data);
                    $('tbody').html(data);
                    }
                    });
                    })
                    </script>
                    <script type="text/javascript">
                    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                    </script>
         </div>
     </div>

 </div>

 @endsection

