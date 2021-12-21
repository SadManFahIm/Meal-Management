@extends('admin.layouts.adminSidebar')
@section('content')

 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">
                 <h1 class="page-title">Teacher List</h1>
             </div>
             <div class="col-sm-8 col-9 text-right m-b-20">
                 <a href="{{ URL::to('register.student.add') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Teacher</a>
             </div>
         </div>
         <form action="" method="">
         <div class="row filter-row">

             <div class="col-sm-6 col-md-3">
                 <div class="form-group form-focus">
                     <label class="focus-label">Teacher ID / Teacher Name</label>
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

                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>NID</th>
                                <th>Action</th>

                             </tr>
                         </thead>
                         <tbody>

                            @foreach($all_teacher as $data)


                              <tr>

                                  <td>{{$data->tid}}</td>
                                  <td>{{$data->t_name}}</td>
                                  <td>{{$data->t_email}}</td>
                                  <td>{{$data->t_address}}</td>

                                  @if($data->t_status==1)
                                      <td style="color: green"><b>Active</b></td>
                                  @elseif($data->t_status==0)
                                      <td style="color: red"><b>Inactive</b></td>

                                  @endif
                                  <td>{{$data->t_phone}}</td>
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../user Image/'.$data->t_image)}}" alt="No Image"></td>
                                <td>{{$data->t_national_id}}</td>





                                 <td class="text-right">
                                    <a href="" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Details and Edit</a>
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

