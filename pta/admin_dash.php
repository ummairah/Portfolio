<?php session_start(); ?>
<?php include "config.php" ?>

<?php
if (!isset($_SESSION['idadmin'])) {
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
            <li class="active">
                <a href="admin_dash.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-tachometer'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
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
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- SIDEBAR -->

    <!-- MAIN -->
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <?php
                $query = "SELECT username FROM  admin ";
                $result = mysqli_query($connect, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <h2>Dashboard</h2>
                    <span> Welcome Back, <?php echo $row['username']; ?></span>
            </div>
            <div class="user--info">
                <img src="images/profile.jpg" alt="" />
            </div>
        </div>

        <div class="card-container">
            <h3 class="main--title"> Today's Data</h3>
            <div class="card-wrapper">
                <div class="payment-card light-red">
                    <div class="card--header">
                        <div class="amount">
                            <br>
                            <span class="title">
                                Completed Booking
                            </span>
                            <span class="amount-value">
                            <?php
                                $kira = mysqli_query($connect, "SELECT * FROM booking WHERE status='completed'");
                                $count = mysqli_num_rows($kira);
                                echo $count;
                                ?>
                            </span>
                        </div>
                        <i class='bx bx-time-five icon dark-red'></i>
                    </div>
                </div>

                <div class="payment-card light-purple">

                    <div class="card--header">
                        <div class="amount">
                            <br>
                            <span class="title">
                                Pending Booking
                            </span>
                            <span class="amount-value">
                                <?php
                                $kira = mysqli_query($connect, "SELECT * FROM booking WHERE status='pending'");
                                $count = mysqli_num_rows($kira);
                                echo $count;
                                ?>
                            </span>
                        </div>
                        <i class="bi bi-calendar-check icon dark-purple"></i>
                    </div>
                </div>

                <div class="payment-card light-green">
                    <div class="card--header">
                        <div class="amount">
                            <br>
                            <span class="title">
                                Customer Complain
                            </span>
                            <span class="amount-value">
                            <?php
                                $kira = mysqli_query($connect, "SELECT * FROM complaint");
                                $count = mysqli_num_rows($kira);
                                echo $count;
                                ?>
                            </span>
                        </div>
                        <i class='bx bx-list-ul icon dark-green'></i>
                    </div>
                </div>

                <div class="payment-card light-blue">
                    <div class="card--header">
                        <div class="amount">
                            <br>
                            <span class="title">
                                Customer Payment
                            </span>
                            <span class="amount-value">
                            <?php
                                $kira = mysqli_query($connect, "SELECT * FROM payment ");
                                $count = mysqli_num_rows($kira);
                                echo $count;
                                ?>
                            </span>
                        </div>
                        <i class='bx bx-credit-card icon dark-blue'></i>
                    </div>
                </div>

            </div>
        </div>

        <div class="tabular--wrapper">
            <h1 class="main--title">
                Upcoming Soon <i class='bx bxs-bell'></i>
            </h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th scope="col"> Date </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Place </th>
                            <th scope="col"> Address </th>
                            <th scope="col"> Person-In-Charge </th>
                            <th scope="col"> Email </th>
                            <th scope="col"> Status </th>
                        </tr>
                        <?php
                        $query = "SELECT * FROM booking WHERE status='pending' ORDER BY date ASC";
                        $result = mysqli_query($connect, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['date']; ?> </td>
                            <td> <?php echo $row['name']; ?> </td>
                            <td> <?php echo $row['place']; ?> </td>
                            <td> <?php echo $row['address']; ?> </td>
                            <td> <?php echo $row['pic']; ?> </td>
                            <td> <?php echo $row['email']; ?> </td>
                            <td> <?php echo $row['status']; ?> </td>
                        </tr>
                    </tbody>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>
<?php } ?>

</html>