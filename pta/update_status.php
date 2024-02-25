<?php include "config.php" ?>

<!-- Update status -->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have sanitized and validated user inputs, if not, please do it.
    $bookingId = $_POST['booking_id'];
    $newStatus = $_POST['new_status'];

    // Update the status in the database using prepared statement
    $query = "UPDATE booking SET status = ? WHERE booking_id = ?";
    $stmt = mysqli_prepare($connect, $query);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, 'si', $newStatus, $bookingId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Redirect back to the page after updating
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($connect);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Invalid request method";
}

?>
