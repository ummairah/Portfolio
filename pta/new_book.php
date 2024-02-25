<?php
session_start();
include "config.php";

if (!isset($_SESSION['idadmin']) && !isset($_SESSION['id'])) {
    header('location: login_admin.php');
    exit(); // Exit to prevent further execution if not authenticated
}

if (isset($_POST['signout'])) {
    session_destroy();
    header('location:index.php');
    exit(); // Exit to prevent further execution after session destruction
}

if (isset($_POST['add'])) {
    $admin_id = isset($_SESSION['idadmin']) ? $_SESSION['idadmin'] : null; // Assuming you still want to track the admin who added the booking
    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null; // This might be null if it's an admin booking

    $name = $_POST['name'];
    $place = $_POST['place'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pic = $_POST['pic'];
    $phone = $_POST['phone'];
    $type = isset($_POST['type']) ? $_POST['type'] : ''; // Fixed the way to retrieve cleaning type
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0; // Fixed the way to retrieve quantity

    // Default rate values
    $carpetRatePerSqft = 0.25; // Change this value according to your pricing for carpet
    $sofaRatePerUnit = 120.00; // Change this value according to your pricing for sofa
    $officeChairRatePerUnit = 20.00; // Change this value according to your pricing for office chair

    // Calculate total based on cleaning type
    if ($type === 'Carpet') {
        $total = $quantity * $carpetRatePerSqft;
    } elseif ($type === 'Sofa') {
        $total = $quantity * $sofaRatePerUnit;
    } elseif ($type === 'Office Chair') {
        $total = $quantity * $officeChairRatePerUnit;
    } else {
        // Handle the case where the cleaning type is not recognized
        $total = 0; // Set a default value or handle it according to your needs
    }

    $mysqli = new mysqli('localhost', 'root', '', 'inviron');

    $query = $mysqli->prepare("INSERT INTO booking (user_id, admin_id, name, place, email, address, pic, phone, type, quantity, total, date, status) VALUES (?, ?, ?, ?,?,?,?,?,?,?,?,?,?)");

    $status = 'pending';
    $query->bind_param('sssssssssssss', $user_id, $admin_id, $name, $place, $email, $address, $pic, $phone, $type, $quantity, $total, $_POST['date'], $status);
    $query->execute();

    if ($query->error) {
        $msg = "<div class='alert alert-danger'>Error: " . $query->error . "</div>";
    } else {
        $msg = "<div class='alert alert-success'>Booking Successful</div>";
        $msg .= "<div class='alert alert-success'>Total: $" . $total . "</div>";
        echo '<script>alert("Booking Successful!");</script>';
        echo '<script>window.location = "booking.php";</script>';
    }
}

function calculateTotal($type, $quantity)
{
    // Default rate values
    $carpetRatePerSqft = 0.25; // Change this value according to your pricing for carpet
    $sofaRatePerUnit = 15; // Change this value according to your pricing for sofa
    $officeChairRatePerUnit = 12; // Change this value according to your pricing for office chair

    // Convert type to lowercase for case-insensitive comparison
    $type = strtolower($type);

    // Calculate total based on cleaning type
    switch ($type) {
        case 'carpet':
            return $quantity * $carpetRatePerSqft;
        case 'sofa':
            return $quantity * $sofaRatePerUnit;
        case 'office chair':
            return $quantity * $officeChairRatePerUnit;
        default:
            return 0; // Set a default value or handle it according to your needs
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
            <li>
                <a href="profile.php?id=<?php echo $_SESSION['idadmin']; ?>">
                    <i class='bx bx-user'></i>
                    <span>Profile</span>
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
            <h3 class="main--title"> Add New Bookings</h3>

            <form action="" method="post" autocomplete="off">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Company Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Place</label>
                        <input type="text" class="form-control" name="place">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Person In Charge</label>
                        <input type="text" class="form-control" name="pic">
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Number Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Type Of Cleaning </label>
                        <div class="form-check">
                            <label>
                                <input class="form-check-input" type="radio" name="type" value="Carpet"> Carpet
                            </label>
                        </div>

                        <div class="form-check">
                            <label>
                                <input class="form-check-input" type="radio" name="type" value="Sofa">Sofa
                            </label>
                        </div>

                        <div class="form-check">
                            <label>
                                <input class="form-check-input" type="radio" name="type" value="Office Chair">Office Chair
                            </label>
                        </div>
                    </div>&nbsp;&nbsp;
                    <div class="form-group col">
                        <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                    <div class="form-row">&nbsp;&nbsp;
                        <div class="form-group col">
                            <label for="exampleFormControlInput1" class="form-label">Address</label>
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                </div>
                <!-- Add more form columns here -->
                <br>
                <button class="btn btn-success" type="submit" name="add"> Add </button>
            </form>
        </div>
    </div>
</body>

</html>