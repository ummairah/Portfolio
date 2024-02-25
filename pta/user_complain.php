<?php
include "config.php";
session_start();

if (!isset($_SESSION['id'])) {
    header('location: login.php');
}

if (isset($_POST['signout'])) {
    session_destroy();
    header('location:index.php');
}

$bookingId = ''; // Initialize $bookingId
$bookingDate = ''; // Initialize $bookingDate

if (isset($_POST['btn_img'])) {
    $complaintText = $_POST['complain'];
    $userId = $_SESSION['id'];

    // Retrieve booking data based on the user ID
    $bookingQuery = "SELECT user_id, date FROM booking WHERE user_id = '$userId'";
    $bookingResult = mysqli_query($connect, $bookingQuery);

    if ($bookingRow = mysqli_fetch_assoc($bookingResult)) {
        $bookingId = $bookingRow['user_id']; // Use 'user_id' instead of 'id'
        $bookingDate = $bookingRow['date'];

        $date_comp = date("Y-m-d");

        // Handle image upload
        $filename = $_FILES["comp_img"]["name"];
        $tempfile = $_FILES["comp_img"]["tmp_name"];
        $destinationDirectory = 'image/';
        $folder = $destinationDirectory . $filename;

        // Create the directory if it doesn't exist
        if (!is_dir($destinationDirectory)) {
            mkdir($destinationDirectory, 0755, true);
        }

        move_uploaded_file($tempfile, $folder);

        // Insert data into the complaint table
        $insertQuery = "INSERT INTO complaint (user_id, date, complain, comp_img) VALUES ('$bookingId', '$bookingDate', '$complaintText', '$filename')";

        if ($filename == "") {
            echo "<div class='alert alert-danger' role='alert'><h4 class='text-center'>Blank not Allowed</h4></div>";
        } else {
            $result = mysqli_query($connect, $insertQuery);

            if ($result) {
                move_uploaded_file($tempfile, $folder);
                echo "<div class='alert alert-success' role='alert'><h4 class='text-center'>Image uploaded</h4></div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'><h4 class='text-center'>Error uploading image</h4></div>";
            }
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'><h4 class='text-center'>Error retrieving booking data</h4></div>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Complain Form</title>
</head>

<body>
    <br><br><br><br>
    <div class="container col-12 border rounded mt-3 bg-light">
        <br>
        <a href="view_user.php?id=<?php echo $user_id = $_SESSION['id']; ?>">
            << Back </a>
                <h1 class="text-center">Complain Form</h1>
                <br>
                <div class="row">
                    <div class="col-lg-6 col-md-offset-3">
                        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="booking_id" value="<?php echo $bookingId; ?>">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="date_comp" value="<?php echo date("Y-m-d"); ?>">
                            </div>

                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="booking_date" value="<?php echo $bookingDate; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"> Complaint Description : </label>
                                <textarea type="text" class="form-control" name="complain"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label"> Upload Image : </label>
                                <input type="file" class="form-control" name="comp_img">
                            </div>
                            <center>
                                <button class="btn btn-primary" type="submit" name="btn_img">Upload</button>
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </center>
                        </form>
                    </div>
                </div>
                <br><br>
    </div>
    <br><br>
</body>

</html>