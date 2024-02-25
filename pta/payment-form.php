<?php include "config.php" ?>
<br><br><br><br>
<center>
    <h3>Processing Payment</h3>
</center>
<br>
<!-- to add jquery library of javascript -->

<div class="container col-7 border rounded mt-3 bg-light">

    <form class="mx-auto" action="payment-generate-gateway.php" method="post">

        <?php
        // filename listing.php
        // use the previous settings

        // embed SQL commands
        $sql = "SELECT total FROM booking";
        // execute SQL commands that will return a result set
        $result = mysqli_query($connect, $sql);

        // check if records were fetched
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $total = $row['total'];
                // echo "<input type='text' name='total' value='$total' disabled>";
            }
        } else {
            echo "No results";
        }

        // close the database connection
        mysqli_close($connect);
        ?>

        <?php
        if (isset($_GET['booking_id']) && isset($_GET['total'])) {
            $booking_id = $_GET['booking_id'];
            $total = $_GET['total'];

            // Rest of your payment form logic here
        } else {
            // Handle the case when the required parameters are not provided
            echo "Booking information not provided.";
        }
        ?>


        <!-- javascript to calculate total price -->
        <script>
            var total = 0;

            function calctotal(price, toglecheck) {
                //var input = document.getElementById("form");
                //alert (toglecheck);
                if (toglecheck == true) {
                    this.total = this.total + price;
                } else {
                    this.total = this.total - price;
                }


                document.getElementById("totalprice").value = total;
            }
        </script>
        <br>
        
        <div class="row justify-content-center">
            <div class="col-4">
                Total Price
                <input type="text" name="totalprice" id="totalprice" value="<?php echo $total; ?>" class="form-control" readonly disable>
            </div>
            <div class="col-4">
                Name<br>
                <input type="text" name="buyername" required class="form-control">
            </div>
        </div>

        <br>
        <div class="row justify-content-center">
            <div class="col-4">
                Email<br>
                <input type="email" name="buyeremail" required class="form-control">
            </div>
            <div class="col-4">
                Telephone Number<br>
                <input type="phone" name="phoneno" required class="form-control">
            </div>            
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6">
                &nbsp;<br>
                <button type="submit" class="btn btn-success">
                    Checkout Toyyibpay payment gateway &gt;&gt;</button>
            </div>            
        </div>
    </form>
    <br><br>
</div>

<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    echo "<div class='alert alert-warning'>
        $error
    </div>";
}
if (isset($_GET['success'])) {
    $success = $_GET['success'];
    echo "<div class='alert alert-success'>
        $success
    </div>";
}
// include "include/footer.template.php"; 
?>