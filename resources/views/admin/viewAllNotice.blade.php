@extends('admin.layouts.adminSidebar')
@section('content')

 <div class="page-wrapper">
     <div class="content">
         <div class="row">
             <div class="col-sm-4 col-3">
                 <h1 class="page-title">Notice List</h1>
             </div>
             <div class="col-sm-8 col-9 text-right m-b-20">
                 <a href="{{ url('notice.add') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Notice</a>
             </div>
         </div>
         <form action="" method="">
         <div class="row filter-row">

             <div class="col-sm-6 col-md-3">
                 <div class="form-group form-focus">
                     <label class="focus-label">Title /Notice ID</label>
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

                                <th>Notice ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Notice For</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                            @foreach($all_notice as $data)


                              <tr>

                                  <td>{{$data->n_id}}</td>
                                  <td>{{$data->n_title}}</td>
                                  <td>{{$data->n_description}}</td>
                                  @if($data->n_type_id==1)
                                      <td>For All</td>
                                  @elseif($data->n_type_id==2)
                                      <td>Students</td>
                                  @elseif($data->n_type_id==3)
                                      <td>Teachers</td>
                                  @endif
                                <td><img class="rounded-circle" style="width:100px;height:100px;"src="{{url('../notice Image/'.$data->n_image)}}" alt="No Image"></td>


                                  <td>{{$data->timestamp}}</td>



                                 <td class="text-right">
                                    <a href="{{URL::to('notice/edit/'.base64_encode($data->n_id))}}" class="btn btn-sm btn-success"><i class="fa fa-check"></i>Edit</a>
                                    <a href="{{URL::to('notice/delete/'.base64_encode($data->n_id))}}" class="btn btn-sm btn-danger"><i class="fa fa-warning"></i>Delete</a>
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

