<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Student List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class=" table table-responsive-xl">
    <thead>
      <tr class="table-danger">

            <th>Student ID</th>
            <th>Student Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Class</th>
            <th>Gurdian Name</th>
            <th>Gurdian Phone</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($all_student as $data)
        <tr>

            <td>{{$data->sid}}</td>
            <td>{{$data->s_name}}</td>
            <td>{{$data->s_email}}</td>
            <td>{{$data->s_address}}</td>
            <td>{{$data->s_gurdian}}</td>
            <td>{{$data->s_gurdian_phone}}</td>

        @endforeach
      </tbody>
    </table>
  </body>
</html>
