<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{$task->title}}</title>
  </head>
  <body>
  <table class="table table-bordered table-inverse">
    <thead>
      <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$task->id}}</td>
        <td>{{$task->title}}</td>
        <td>{{$task->description}}</td>
        
      </tr>
    </tbody>
  </table>
  </body>
</html>