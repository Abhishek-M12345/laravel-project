<!DOCTYPE html>
<html>
<head>
  <title>Dynamic Table</title>
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .table-container {
    max-height: 600px; /* Set the desired maximum height */
    overflow-y: scroll;
    border: 1px solid #ccc; /* Add border for visual distinction */
}

.form-group {
    margin-bottom: 15px;
  }

  
  input[type="text"] {
    width: 30%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top:10px;
    margin-left:10px;
  }
  .btn{
    color: 1px solid green;
    border-radius: 4px;
    margin-left:10px;
    padding: 10px;

  }


  .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
    }

    /* Style for the close button */
    .close {
        position: absolute;
        top: 0;
        right: 0;
        padding: 10px;
        cursor: pointer;
    }
    </style>
</head>
<body>
   <div class="header">
        <h1>Wellcome To Dashboard</h1>
    </div>
    <div class="dashboard">
        <div class="sidebar">
            <a href="{{url('/dashboard')}}">Home</a>
            <a href="{{url('/register/view')}}">View</a>
            <a href="#">Change Password</a>
            <a href="#">Settings</a>
        </div>
  <div class="table-container">
    <div class="row m-2">
      <form action="" class="col-4">
        <div class="form-group">
          <input type="text" name="search" id="" class="form-control" placeholder="Search by name or mail">
          <button class="btn btn-primary">Search</button>
        </div>    
      </form>
    </div>
    <div class="row m-2">
    <button class="btn" id="openModalButton" style="color:green">Add User <i class="fa fa-user-plus"></i></button>
    </div>
    <h3> Show All Data</h3>
    <table id="dynamic-table">
      <thead>
        <tr>
          <th>Sl_No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <!-- <th>Password</th> -->
          <th>Updated At</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($customers as $customer)
      <tr>
          <td>{{$customer->reg_id}}</td>
          <td>{{$customer->name}}</td>
          <td>{{$customer->email}}</td>
          <td>{{$customer->phone}}</td>
          <!-- <td>{{$customer->password}}</td> -->
          <td>{{$customer->updated_at}}</td>
          <td>{{$customer->created_at}}</td>
          <td>
            <a href="{{url('/register/delete/')}}/{{$customer->reg_id}}"><i class="fa fa-trash" aria-hidden="true" style="font-size:30px;color:red"></i></a> &nbsp
            <a href="{{url('/register/edit/')}}/{{$customer->reg_id}}"><i class="fa fa-edit" style="font-size:30px;color:#42cbf5"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="row">
      
      </div>
  </div>
      </div>
  <div class="footer">
        <p>&copy; 2023 Your Dashboard. All rights reserved.</p>
    </div>
<!-- ---------------------------modal========================= -->
    <div id="myModal" class="modal">
    <div class="modal-content">
    <span id="closeModal"><i class="fa fa-times" aria-hidden="true"></i></span>
     
    <div class="container">
    <div class="reg_form">
    <h2>Registration Form</h2>
    <form action="{{url('/')}}/new-registration" method="post">
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
    </div>
  </div>



    </div>
    </div>

  <script src="script.js"></script>

  <script>

    var modal = document.getElementById("myModal");
    var closeModal = document.getElementById("closeModal");

    // Get the button that opens the modal
    var openModalButton = document.getElementById("openModalButton");

    // Function to open the modal
    function openModal() {
        modal.style.display = "block";
    }

    // Function to close the modal
    function closeModalFunction() {
        modal.style.display = "none";
    }

    // Event listener for button click
    openModalButton.addEventListener("click", openModal);

    // Event listener for close button click
    closeModal.addEventListener("click", closeModalFunction);
</script>
</body>
</html>
