<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="container">
    <div class="l_form">
    <h2>Login Form</h2>
    <form action="{{url('/')}}/login-user" method="post">
      @if(Session::has('success'))
      <div class="alert alert-success">{{Session::get('success')}}</div>
      <script>
        setTimeout(function() {
        window.location.href = "{{ url('/dashboard') }}";
        }, 200); // 2000 milliseconds = 2 seconds
      </script>
      @endif
      @if(Session::has('fail'))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
      @endif
      @csrf
      <label for="email">Email:</label>
      <input type="text" name="email" id="emil" placeholder="Enter Email" value="{{old('email')}}">
      <span class="text-danger"> @error('email') {{$message}} @enderror</span>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" placeholder="Enter Password">
       <span class="text-danger"> @error('password') {{$message}} @enderror</span>
      <button type="submit">Sign in</button>
    </form>
    <br>
    <a href="register"> New User !! Register Here</a>
    <p id="loginStatus"></p>
    </div>
  </div>

  <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>