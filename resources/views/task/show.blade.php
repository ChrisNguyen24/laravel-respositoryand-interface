<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Repository Pattern Tutorial</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  </head>
  <body>
  @if(Session::has('message'))
  <div class="alert alert-success">{{Session::get('message')}}</div>

  @endif
  <a href="{{route('pdf',$task->id)}}"><button class="btn btn-success">Download PDF</button></a>
  <a href="{{route('task.index')}}"><button class="btn btn-success">View All</button></a>
  <a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
    <a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a></br>
  Title:   {{$task->title}}</br>
  Description::{{$task->description}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  </body>
</html>