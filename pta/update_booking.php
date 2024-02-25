<?php
session_start();
include "config.php";

// Check if the form is submitted
if (isset($_POST['update'])) {
    // Your existing update logic here
    $booking_id = $_POST['booking_id'];
    $name = $_POST['name'];
    $place = $_POST['place'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pic = $_POST['pic'];
    $phone = $_POST['phone'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $date = $_POST['date'];

    // Format the date using DateTime to ensure correctness
    $formattedDate = DateTime::createFromFormat('Y-m-d', $date);
    $formattedDate = $formattedDate ? $formattedDate->format('Y-m-d') : null;

    // Use prepared statement to prevent SQL injection
    $updateQuery = $connect->prepare("UPDATE booking SET name=?, place=?, email=?, address=?, pic=?, phone=?, type=?, quantity=?, total=?, date=? WHERE booking_id=?");
    $updateQuery->bind_param('ssssssssssi', $name, $place, $email, $address, $pic, $phone, $type, $quantity, $total, $formattedDate, $booking_id);

    // Execute the update query
    if ($updateQuery->execute()) {
        // Fetch updated details including total
        $selectQuery = $connect->prepare("SELECT * FROM booking WHERE booking_id = ?");
        $selectQuery->bind_param('i', $booking_id);
        $selectQuery->execute();
        $result = $selectQuery->get_result();

        if ($result->num_rows > 0) {
            $booking = $result->fetch_assoc();
            $updatedTotal = $booking['total'];

            // Alert box using JavaScript
            echo '<script>alert("Booking updated successfully!");</script>';
            header('location: view_book.php?id=' . $booking_id . '&total=' . $updatedTotal);
            exit;  // Terminate script after redirect
        } else {
            echo "Error fetching updated booking details.";
        }
    } else {
        echo "Update Unsuccessful: " . $updateQuery->error;
    }
} elseif (isset($_POST['delete'])) {
    // Handle delete logic here
    $booking_id = $_POST['booking_id'];

    // Use prepared statement to prevent SQL injection
    $deleteQuery = $connect->prepare("DELETE FROM booking WHERE booking_id=?");
    $deleteQuery->bind_param('i', $booking_id);

    // Execute the delete query
    if ($deleteQuery->execute()) {
        // Alert box using JavaScript
        echo '<script>alert("Booking deleted successfully!");</script>';
        header('location: your_redirect_page_after_delete.php');
        exit;  // Terminate script after redirect
    } else {
        echo "Delete Unsuccessful: " . $deleteQuery->error;
    }
}
?>
