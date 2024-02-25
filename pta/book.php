<?php include "config.php" ?>
<?php session_start() ?>

<?php

if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
}

if (isset($_POST['submit'])) {
    // Check if 'id' is set in the session
    if (!isset($_SESSION['id'])) {
        die("<div class='alert alert-danger'>Error: User not authenticated.</div>");
    }

    // Retrieve user_id from the session
    $user_id = $_SESSION['id'];

    // Rest of your code remains unchanged
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
    $sofaRatePerUnit = 120; // Change this value according to your pricing for sofa
    $officeChairRatePerUnit = 20; // Change this value according to your pricing for office chair

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

    // Default value for status
    $status = 'Pending';

    $mysqli = new mysqli('localhost', 'root', '', 'inviron');

    $query = $mysqli->prepare("INSERT INTO booking (user_id, name, place, email, address, pic, phone, type, quantity,total, date, status) VALUES (?, ?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?)");

    $query->bind_param('ssssssssssss', $user_id, $name, $place, $email, $address, $pic, $phone, $type, $quantity, $total, $date, $status);
    $query->execute();

    if ($query->error) {
        $msg = "<div class='alert alert-danger'>Error: " . $query->error . "</div>";
    } else {
        $msg = "<div class='alert alert-success'>Booking Successful</div>";
        echo '<script>alert("Booking Successful!");</script>';
        echo '<script>window.location = "view_user.php";</script>';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <br>
    <div class="container col-12 border rounded mt-3 bg-light">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
        <br>
        <div class="row ">
            <div class="col-lg-6 col-md-offset-3">
                <?php echo isset($msg) ? $msg : ''; ?>
                <form action="" method="post" autocomplete="off">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> Company Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"> Place </label>
                        <input type="text" class="form-control" name="place">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email </label>
                        <input type="text" class="form-control" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Address </label>
                        <input type="text" class="form-control" name="address">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Person In Charge </label>
                        <input type="text" class="form-control" name="pic">
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Number Phone : </label>
                        <input type="number" class="form-control" name="phone">
                    </div>

                    <!-- radio button -->
                    <div class="mb-3">
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
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Quantity </label>
                        <input type="number" class="form-control" name="quantity">
                    </div>
                    <center>
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                        <button class="btn btn-danger" type="reset">Reset</button>
                </form>
            </div>
        </div>
        <br><br>
    </div>
    <br><br>
</body>
</html>