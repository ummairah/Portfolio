<?php session_start(); ?>
<?php include "config.php" ?>

<?php
if (!isset($_SESSION['idadmin']) && !isset($_SESSION['id'])) {
    header('location: login_admin.php');
}
?>


<?php
if (isset($_POST['signout'])) {
    session_destroy();
    header('location:index.php');
}
?>

<html>

<head>
    <link rel="stylesheet" href="admin.css">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <!-- SIDEBR -->
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="admin_dash.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-tachometer'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="booking.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bxs-store'></i>
                    <span>Booking</span>
                </a>
            </li>
            <li>
                <a href="admin_complain.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-list-ul'></i>
                    <span>Complain</span>
                </a>
            </li>
            <li>
                <a href="admin_payment.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-credit-card'></i>
                    <span>Payment</span>
                </a>
            </li>
            <!-- <li>
                <a href="profile.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-user'></i>
                    <span>Profile</span>
                </a>
            </li> -->
            <li class="logout">
                <a name="signout">
                    <i class='bx bx-log-out'></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- SIDEBAR -->

    <!-- MAIN -->
    <div class="main--content">
        <div class="card-container">
            <h3 class="main--title"> Cleaning Records</h3>
            <br>
            <a href="new_book.php">
                <button type="button" class="btn btn-outline-success"> + Add New</button>
            </a>
            <br><br>
            <table>
                <thead>
                    <tr>
                        <th scope="col" class="text-center"> Date </th>
                        <th scope="col" class="text-center"> Name </th>
                        <th scope="col" class="text-center"> Place </th>
                        <th scope="col" class="text-center"> Address </th>
                        <th scope="col" class="text-center"> P.I.C </th>
                        <th scope="col" class="text-center"> Email </th>
                        <th scope="col" class="text-center"> Status </th>
                        <th scope="col" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  booking WHERE status = 'pending' ";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td> <?php echo $row['date']; ?> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['place']; ?> </td>
                            <td> <?php echo $row['address']; ?> </td>
                            <td> <?php echo $row['pic']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>
                            <td> <?php echo $row['status']; ?> </td>

                            <!-- ... other table elements ... -->
                            <td>
                                <a href="view_book.php?id=<?php echo $row['booking_id']; ?>">
                                    <button type="button" class="btn btn-primary">View</button>
                                </a>
                                <form action="update_status.php" method="post" style="display: inline-block;">
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id']; ?>">
                                    <select name="new_status" class="form-control" onchange="this.form.submit()">
                                        <option value="">Action :</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Declined">Declined</option>
                                    </select>
                                </form>
                            </td>
                            <!-- ... other table elements ... -->



                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
        <div class="card-container">
            <h3 class="main--title"> Completed Cleaning </h3>
            <br>
            <table>
                <thead>
                    <tr>
                        <th scope="col" class="text-center"> Date </th>
                        <th scope="col" class="text-center"> Name </th>
                        <th scope="col" class="text-center"> Place </th>
                        <th scope="col" class="text-center"> Address </th>
                        <th scope="col" class="text-center"> P.I.C </th>
                        <th scope="col" class="text-center"> Email </th>
                        <th scope="col" class="text-center"> Status </th>
                        <th scope="col" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  booking WHERE status = 'completed' ";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"> <?php echo $row['date']; ?> </td>
                            <td class="text-center"> <?php echo $row['name']; ?> </td>
                            <td class="text-center"> <?php echo $row['place']; ?> </td>
                            <td class="text-center"> <?php echo $row['address']; ?> </td>
                            <td class="text-center"> <?php echo $row['pic']; ?> </td>
                            <td class="text-center"> <?php echo $row['email']; ?> </td>
                            <td class="text-center"> <?php echo $row['status']; ?> </td>

                            <!-- ... other table elements ... -->
                            <td>
                                <a href="view_book.php?id=<?php echo $row['booking_id']; ?>&status=<?php echo $row['status']; ?>">
                                    <button type="button" class="btn btn-primary">View</button>
                                </a>
                            </td>

                            <!-- ... other table elements ... -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
        <div class="card-container">
            <h3 class="main--title"> Decline Cleaning </h3>
            <br>
            <table>
                <thead>
                    <tr>
                        <th scope="col" class="text-center"> Date </th>
                        <th scope="col" class="text-center"> Name </th>
                        <th scope="col" class="text-center"> Place </th>
                        <th scope="col" class="text-center"> Address </th>
                        <th scope="col" class="text-center"> P.I.C </th>
                        <th scope="col" class="text-center"> Email </th>
                        <th scope="col" class="text-center"> Status </th>
                        <th scope="col" class="text-center"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM  booking WHERE status = 'declined' ";
                    $result = mysqli_query($connect, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td class="text-center"> <?php echo $row['date']; ?> </td>
                            <td class="text-center"> <?php echo $row['name']; ?> </td>
                            <td class="text-center"> <?php echo $row['place']; ?> </td>
                            <td class="text-center"> <?php echo $row['address']; ?> </td>
                            <td class="text-center"> <?php echo $row['pic']; ?> </td>
                            <td class="text-center"> <?php echo $row['email']; ?> </td>
                            <td class="text-center"> <?php echo $row['status']; ?> </td>

                            <!-- ... other table elements ... -->
                            <td>
                                <a href="view_book.php?id=<?php echo $row['booking_id']; ?>">
                                    <button type="button" class="btn btn-primary">View</button>
                                </a>
                            </td>
                            <!-- ... other table elements ... -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <br>
    </div>
    </div>
</body>

</html>