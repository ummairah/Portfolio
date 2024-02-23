<?php session_start(); ?>
<?php include "header.php"; ?>

<?php 
if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if (!$query) {
        die ('query failed' . mysqli_error($connect));
    }

    while ($row=mysqli_fetch_array($query)) {
        $idadmin=$row['idadmin'];
        $username=$row['username'];
        $password=$row['password'];       
    }
    if($username==$username && $password==$password) {
        //store data                                                                        
        $_SESSION['idadmin']=$idadmin;
        $_SESSION['username']=$username;
        $_SESSION['password']=$password;

        header('location:dashboard_admin.php?idadmin='.$idadmin);
    }
    else {
      
        header('location:login_admin.php');
    }
}

?>

<section class="vh-100" style="background-color: #AFE1AF;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Log Masuk Admin</h3>

            <form action="" method="post">

            <div class="form-outline mb-3">              
            <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>

            </div>

            <div class="form-outline mb-3">
              <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
            </div>

            <br>
            <div class="mb-3">
                <input type="submit" value="Log In" name="login" class="btn btn-success" >
            </div>

        </div>
        </div>
      </div>
    </div>
  </div>
</section>