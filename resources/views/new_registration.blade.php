<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
  <div class="container">
    <div class="reg_form">
    <h2>Registration Form</h2>
    <form action="{{url('/')}}/register" method="post">
      @csrf
      <label for="username">Name:</label>
      <input type="text" name="name" required>

      <label for="email">Email:</label>
      <input type="email" name="email" required>

      <label for="phone">Phone No:</label>
      <input type="text" name="phone" required>

      <label for="password">Password:</label>
      <input type="password" name="password" required>

      <label for="confirmPassword">Confirm Password:</label>
      <input type="password" name="confirmPassword" required>

      <button type="submit">Submit</button>
    </form>
    <br>
    <a href="/"> Already Register !! Login Here</a>
    <p id="registrationStatus"></p>
   </div>
  </div>

  <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>
