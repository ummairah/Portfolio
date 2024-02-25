<?php include "config.php" ?>
<?php session_start(); ?>

<?php
// Include ToyyibPay configuration file (contains API credentials)
include "toyyibpay_config.php";

// Function to handle ToyyibPay callback
function handleToyyibPayCallback()
{
    // Get JSON data from ToyyibPay notification
    $toyyibPayData = file_get_contents("php://input");
    $toyyibPayData = json_decode($toyyibPayData, true);

    // Extract relevant information
    $booking_id = $toyyibPayData['booking_id'];
    $paymentStatus = $toyyibPayData['status'];
    $transactionID = $toyyibPayData['transaction_id'];
    // ... extract other relevant data

    // Update local database with payment information
    $mysqli = new mysqli('localhost', 'root', '', 'inviron');

    $query = $mysqli->prepare("INSERT INTO payment (booking_id, status, transaction_id) VALUES (?, ?, ?");
    $query->bind_param('sss', $booking_id, $paymentStatus, $transactionID);
    $query->execute();

    // Close database connection
    $mysqli->close();

    // Perform additional actions based on payment status if needed

    // Send a response back to ToyyibPay (e.g., HTTP 200 OK)
    http_response_code(200);
    echo "Callback received successfully";
}

// Check if the request is a ToyyibPay callback
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_TYB_WEBHOOK'])) {
    // Handle ToyyibPay callback
    handleToyyibPayCallback();
} else {
    // Handle other parts of your application
    // ...

    $merchantCode = "uzfgbzwg"; // Replace with your actual ToyyibPay merchant code
    $productCode = "your_product_code";
    // Example: Generate payment link and redirect user to ToyyibPay
    $paymentLink = "https://toyyibpay.com/{$merchantCode}/{$your_product_code}";
    header("Location: $paymentLink");
    exit;
}
