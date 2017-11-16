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
 
  
    <form action="{{route('task.store')}}" method="post">
      {{csrf_field()}}
         <div class="form-group">
             <label for="title" class="col-md-4 control-label">Title:</label>
             <div class="col-md-6" >
                 <input type="text" name="title" id="title" class="form-control" required autofocus><br>
             </div>
         </div>

         <div class="form-group">
             <label for="boby" class="col-md-4 control-label"> Description:</label>
             <div class="col-md-6">
                 <input type="textarea"  class="form-control" name="body" id="body" required autofocus><br>
             </div>
         </div>
         
         <div class="col-md-6">
             <button class="btn btn-success btn-lg col-md-offset-10">Create</button>
         </div>
    </form>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  </body>
</html>