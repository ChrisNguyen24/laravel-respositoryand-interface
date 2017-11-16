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
  <div class="alert alert-success">
     <span>{{Session::get('message')}}</span>
  </div>
  @elseif(Session::has('warning'))
  <div class="alert alert-danger">
    <span>{{Session::get('warning')}}</span>
  </div>
  @endif
  <a href="{{route('task.create')}}" class="btn btn-primary">Create</a>
  <table class="table table-responsive table-striped">
    <thead>
    <?php $no=1;
    ?>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach($tasks as $task)
    
    
      <td>{{$no++}}</td>
      <td>{{$task->title}}</td>
      <td>{{$task->description}}</td>
      <td><a class="btn btn-primary" href="{{route('task.edit',$task->id)}}">Edit</a></td>
      <td><form action="{{route('task.destroy',$task->id)}}" method="POST">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <div class="form-group">
          <input type="submit" name="delete"  class="btn btn-danger" value="Delete" onclick="alert('sure to delete ? ')">
        </div>
      </form></td>
    <tr>
     @endforeach
      </tbody>
      </table>
     <form action="{{route('sendmail')}}" method="post">
       {{csrf_field()}}
       <input type="hidden" name="_method" value="get">
       <div class="form-group">
             <label for="mail" class="col-md-4 control-label">Email:</label>
             <div class="col-md-6" >
                 <input type="text" name="mail" id="title" class="form-control" required autofocus><br>
             </div>
         </div>
       <div class="col-md-6">
             <button class="btn btn-success btn-lg col-md-offset-10">Send Email</button>
         </div>
     </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  </body>
</html>