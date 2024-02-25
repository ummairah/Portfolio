<?php
session_start();
include "config.php";

if (!isset($_SESSION['idadmin']) && !isset($_SESSION['id'])) {
    header('location: login_admin.php');
}

if (isset($_POST['signout'])) {
    session_destroy();
    header('location:index.php');
}

$booking_id = isset($_GET['id']) ? $_GET['id'] : '';

if (!empty($booking_id)) {
    // Use prepared statement to prevent SQL injection
    $query = $connect->prepare("SELECT * FROM booking WHERE user_id = ?");
    $query->bind_param('i', $booking_id);
    $query->execute();

    // Use get_result if available
    $result = method_exists($query, 'get_result') ? $query->get_result() : null;

    if ($result) {
        // Use fetch_assoc if using get_result
        $booking = $result->fetch_assoc();
    } else {
        // Use bind_result and fetch if get_result is not available
        $query->bind_result($id, $name, $place, $email, $address, $pic, $phone, $type, $quantity);
        $query->fetch();
        $booking = compact('id', 'name', 'place', 'email', 'address', 'pic', 'phone', 'type', 'quantity');
    }

    // Continue with the rest of your code...
} else {
    // Handle the case where $booking_id is empty
    echo "Booking ID is not provided.";
}


if (isset($_POST['reply'])) {
    $complaint_id = $_POST['complaint_id'];
    $admin_reply = $_POST['admin_reply'];

    // Use prepared statement to prevent SQL injection
    $updateQuery = $connect->prepare("UPDATE complaint SET admin_reply=? WHERE user_id=?");
    $updateQuery->bind_param('si', $admin_reply, $complaint_id);

    // Execute the update query
    if ($updateQuery->execute()) {
        // Alert box using JavaScript
        echo '<script>alert("Admin reply added successfully!");</script>';
        header('location: admin_complain.php?id=' . $_SESSION['idadmin']);
        exit;  // Terminate script after redirect
    } else {
        echo "Update Unsuccessful: " . $updateQuery->error;
    }
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
            <li>
                <a href="booking.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bxs-store'></i>
                    <span>Booking</span>
                </a>
            </li>
            <li >
                <a href="admin_complain.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-list-ul'></i>
                    <span>Complain</span>
                </a>
            </li>
            <li class="active">
                <a href="https://toyyibpay.com/index.php/bill">
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
            <h3 class="main--title"> Customer Complain</h3>
            <br>
            <table>
                <thead>
                    <tr>
                        <th scope="col"> Name </th>
                        <th scope="col"> Total Price </th>
                        <th scope="col"> E-Mail </th>
                        <th scope="col"> Phone Number </th>
                        <th scope="col"> Booking ID </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM payment WHERE 1";
                    $result2 = mysqli_query($connect, $query);
                    while ($fetch = mysqli_fetch_array($result2)) {
                    ?>
                        <tr>
                            <td> <?php echo $fetch['buyername']; ?> </td>
                            <td> <?php echo $fetch['totalprice']; ?> </td>
                            <td> <?php echo $fetch['buyeremail']; ?> </td>
                            <td> <?php echo $fetch['phoneno']; ?> </td>
                            <td> <?php echo $fetch['booking_booking_id']; ?> </td>
                            <!-- <td><img src="./image/<?php echo $fetch['comp_img'] ?>" width=200px alt=""></td> -->
                            <!-- <td>
 
                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</body>

</html>