<?php
session_start();
include "config.php";

if (!isset($_SESSION['idadmin']) && !isset($_SESSION['id'])) {
    header('location: login_admin.php');
    exit(); // Ensure that the script stops after redirect
}

if (isset($_POST['signout'])) {
    session_destroy();
    header('location: index.php');
    exit();
}

$booking = [];

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];

    $query = $connect->prepare("SELECT * FROM booking WHERE booking_id = ?");
    $query->bind_param('i', $booking_id);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $booking = $result->fetch_assoc();
    } else {
        echo "Booking not found.";
        exit();
    }
} else {
    echo "Booking ID is not provided.";
    exit();
}

$statement_id = isset($_GET['id']) ? $_GET['id'] : '';

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
            <h3 class="main--title"> Bookings Details</h3>
            <br>
            <form action="update_booking.php" method="post" autocomplete="off">
                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $booking['name']; ?>">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Place</label>
                        <input type="text" class="form-control" name="place" value="<?php echo $booking['place']; ?>">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $booking['email']; ?>">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $booking['address']; ?>">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Person In Charge</label>
                        <input type="text" class="form-control" name="pic" value="<?php echo $booking['pic']; ?>">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Number Phone</label>
                        <input type="number" class="form-control" name="phone" value="<?php echo $booking['phone']; ?>">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Type Of Cleaning</label>
                        <input type="text" class="form-control" name="type" value="<?php echo $booking['type']; ?>">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="<?php echo $booking['quantity']; ?>">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Booking Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $booking['date']; ?>">
                    </div>&nbsp;&nbsp;
                </div>
                <!-- Add more form columns here -->
                <br>
                <?php
                $hideButtons = false; // Set default value
                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    $hideButtons = ($status === 'completed' || $status === 'declined');
                }
                ?>
                <center>
                    <a <?php if ($hideButtons) echo 'style="display:none;"'; ?>>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                    </a>
                    <a <?php if ($hideButtons) echo 'style="display:none;"'; ?>>
                        <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </a>

                    <a href="print_test.php?id=<?php echo $booking_id; ?>">
                        <button type="button" class="btn btn-primary">View Statement</button>
                    </a>
            </form>
        </div>
    </div>
</body>

</html>