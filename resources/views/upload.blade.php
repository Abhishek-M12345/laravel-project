<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>upload file</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <form method="post" enctype="multipart/form-data" action="{{url('/upload')}}">
    @csrf
    <div class="container">
        <div class="form-group" mt-2>
            <lebel for=""> Upload File </lebel>
            <input type="file" name="image" id="" class="form-control" placeholder="select file" area-describedy="helpId">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>
   
  </form> 

</body>
</html>
