<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .dashboard {
            display: flex;
        }

        .sidebar {
            height:600px;
            width: 250px;
            background-color: #bdddf0;
            color: #fff;
            padding: 20px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        /* Additional styling for demonstration purposes */
        .header {
            background-color: #222;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .footer {
            background-color: #222;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 3px;
        padding: 10px;
        cursor: pointer;
    }
    
    form {
        display: flex;
        flex-direction: column;
    }

    label {
        font-weight: bold;
    }

    input[type="password"] {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 40px;
        width: 500px;
        height: 500px;
        margin-top: 20px;
    }


    </style>
</head>
<body>
    <div class="header">
        <h1>Wellcome To Dashboard</h1>
    </div>
    <div class="dashboard">
        <div class="sidebar">
            <a href="#">Home</a>
            <a href="{{url('/register/view')}}">View</a>
            <a href="{{url('/change-pwd')}}">Change Password</a>
            <a href="#">Settings</a>
            <a href="{{url('')}}">Logout</a>
        </div>
        <div class="container">

        <h1>Change Password</h1>
        <form action="{{url('/')}}/change-pwd" method="post">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            <script>
                setTimeout(function() {
                window.location.href = "{{ url('/') }}";
                }, 200); // 2000 milliseconds = 2 seconds
            </script>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <label for="currentPassword">Current Password</label>
            <input type="password" id="currentPassword" name="currentPassword" >
            <span class="text-danger"> @error('currentPassword') {{$message}} @enderror</span>

            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" name="newPassword" >
            <span class="text-danger"> @error('newPassword') {{$message}} @enderror</span>

            <label for="confirmPassword">Confirm New Password</label>
            <input type="password" id="confirmPassword" name="confirm_password" >
            <span class="text-danger"> @error('newPassword') {{$message}} @enderror</span>

            <button type="submit">Change Password</button>
        </form>
 
        </div>
    </div>   

    <div class="footer">
        <p>&copy; 2023 Your Dashboard. All rights reserved.@Abhishek@</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>
</html>
