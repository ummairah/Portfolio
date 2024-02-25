<?php include "config.php" ?>

<?php

if (isset($_POST['register'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "INSERT INTO user(firstname, lastname, email, username, password) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$username}', '{$password}')";

  $add = mysqli_query($connect, $query);

  if (!$add) {
    echo "Something Wrong !", mysqli_error($connect);
  } else {
    echo '<script>';
    echo 'alert("Success ! You can log in to your account now. ");';
    echo 'window.location.href = "login_user.php";';
    echo '</script>';
  }
}
?>

<section class="">
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Come And<br />
            <span class="text-success">Join Us !</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Register here if you dont have an account
          </p>
          <p style="color: hsl(217, 10%, 50.8%)">
            If you already have an account <a href="login_user.php">Click Here</a>
          </p>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">

              <form action="" method="post">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label> First Name </label>
                    <div class="form-outline">
                      <input type="text" class="form-control" name="firstname" required>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label> Last Name</label>
                    <div class="form-outline">
                      <input type="text" class="form-control" name="lastname" required>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" id="form3Example3" class="form-control" name="email" required>
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Username</label>
                  <input type="text" id="form3Example3" class="form-control" name="username" required>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Password</label>
                  <input type="password" id="form3Example4" class="form-control" name="password" required>
                </div>

                <br>
                <!-- Submit button -->
                <center>
                  <button type="submit" name="register" value="Sign Up" class="btn btn-success btn-block mb-4">
                    Sign Up
                  </button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>
</section>