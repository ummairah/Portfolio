<?php include "config.php" ?>
<?php session_start(); ?>

<?php
if (!isset($_SESSION['id'])) {
  header('location: login.php');
}
?>

<?php
if (isset($_POST['signout'])) {
  session_destroy();
  header('location:index.php');
}
?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;
?>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="icon/logo.ico" alt="" width="100" height="80"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="calendar.php?id=<?php echo $user_id = $_SESSION['id']; ?>">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="view_user.php?id=<?php echo $user_id = $_SESSION['id']; ?>"> View History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="view_complaint.php?id=<?php echo $user_id = $_SESSION['id']; ?>"> View Complaint </a>
          </li>
          &nbsp;

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-user fa-lg" style="color: #297f33;"></i></a>
            <ul class="dropdown-menu">
              <li>
                <form action="" method="post" style="margin: 0; padding: 0;">
                  <input type="hidden" name="signout" value="1">
                  <button type="submit" class="dropdown-item" style="color: #ff0000; border: none; background: none; cursor: pointer;">Log Out</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <div class="container col-16 border rounded mt-3 bg-body-tertiary ">
    <br>
    <h2 style="margin-top: 25px;" class="text-center"> Complaint History </h2>
    <br>
    <table class="table table-bordered align-middle mb-0 bg-whipte text-center">
      <thead style="background-color: #3498db; color: #ffffff;">
        <tr class="table text-center">
          <th scope="col">Complain Date</th>
          <th scope="col">Complain</th>
          <th scope="col">Date Cleaning</th>
          <th scope="col">Admin Reply</th>
        </tr>
      </thead>

      <?php
      $user_id = $_SESSION['id'];
      $query = "SELECT * FROM  complaint WHERE user_id = '$user_id'";
      $result = mysqli_query($connect, $query);

      while ($row = mysqli_fetch_array($result)) {
      ?>
        <tbody>
          <tr>
            <th scope="row"> <?php echo $row['date_comp']; ?> </th>
            <td> <?php echo $row['complain']; ?> </th>
            <td> <?php echo $row['date']; ?> </td>
            <td> <?php echo $row['admin_reply']; ?> </td>
          </tr>
        </tbody>
      <?php } ?>
    </table>
    <br>
  </div>
</body>