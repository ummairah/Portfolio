<?php session_start() ?>
<?php include "config.php" ?>

<?php

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Use prepared statements to prevent SQL injection
  $query = mysqli_prepare($connect, "SELECT * FROM admin WHERE username=? AND password=?");
  mysqli_stmt_bind_param($query, 'ss', $username, $password);
  mysqli_stmt_execute($query);
  mysqli_stmt_store_result($query);

  if (mysqli_stmt_num_rows($query) == 1) {
    // User exists, set session variables and redirect
    mysqli_stmt_bind_result($query, $idadmin, $email, $username, $password);
    mysqli_stmt_fetch($query);

    $_SESSION['idadmin'] = $idadmin;
    $_SESSION['email'] = $email;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header('location:admin_dash.php?idadmin=' . $idadmin);
  } else {
    echo '<script>';
    echo 'alert("Incorrect password. Please try again.");';
    echo 'window.location.href = "login_admin.php";';
    echo '</script>';
  }

  mysqli_stmt_close($query);
  mysqli_close($connect);
}
?>

<br><br><br>
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Welcome<br />
            <span class="text-success">Back !</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Log In to your account here
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">

              <form action="" method="post">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                    </div>
                  </div>
                </div>

                <!-- username input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Username</label>
                  <input type="text" id="form3Example3" class="form-control" name="username" />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" id="form3Example4" class="form-control" name="password" />
                </div>

                <br>
                <!-- Submit button -->
                <center>
                  <button type="submit" name="login" value="Log In" class="btn btn-success btn-block mb-4"> Log In </button>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p> Log In As User ? <a href="login_user.php" style="text-decoration: none;"> Click Here</a></p>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>