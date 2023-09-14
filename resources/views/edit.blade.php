<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Form</title>
  <link rel="stylesheet" href="{{ asset('css/main_edit.css') }}">
</head>
<body>
  <div class="container">
    <div class="reg_form">
    <h2>Update Customer</h2>
    <form action="" method="post">
      @csrf
      <label for="username">Name:</label>
      <input type="text" name="name" value="{{$customer->name}}">

      <label for="email">Email:</label>
      <input type="email" name="email" value="{{$customer->email}}">

      <label for="phone">Phone No:</label>
      <input type="text" name="phone" value="{{$customer->phone}}">

      <button type="submit">Update</button>
    </form>
    <p id="registrationStatus"></p>
   </div>
  </div>

  <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>
