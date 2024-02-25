<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $totalprice = $_POST['totalprice'];
    $buyername = $_POST['buyername'];
    $buyeremail = $_POST['buyeremail'];
    $phoneno = $_POST['phoneno'];

    // Insert data into the database
    $mysqli = new mysqli('localhost', 'root', '', 'your_database_name');

    $query = $mysqli->prepare("INSERT INTO your_table_name (totalprice, buyername, buyeremail, phoneno) VALUES (?, ?, ?, ?)");

    $query->bind_param('ssss', $totalprice, $buyername, $buyeremail, $phoneno);
    $query->execute();

    if ($query->error) {
        // Handle database insertion error
        $error = $query->error;
        header('Location: payment-generate-gateway.php?error=' . $error);
        exit();
    } else {
        // Redirect to payment gateway with booking information
        header('Location: payment-generate-gateway.php?total=' . $totalprice . '&buyername=' . $buyername . '&buyeremail=' . $buyeremail . '&phoneno=' . $phoneno);
        exit();
    }
} else {
    // Handle invalid request method
    header('Location: payment-generate-gateway.php?error=Invalid request method');
    exit();
}
?>
