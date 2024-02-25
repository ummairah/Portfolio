<?php
session_start();
include "config.php";
?>

<?php
if (isset($_GET['id'])) {
    // Retrieve statement ID from URL
    $booking_id = $_GET['id'];

    // Modify the SQL query to use the correct column name
    $query = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
    $result2 = mysqli_query($connect, $query);
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <br>

    <?php
    $sql = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
    $result = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_assoc($result)) {

    ?>
        <div class="container d-flex justify-content-center mt-60 mb-60">
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                    <button class="btn btn-outline-success" id="download"> Download pdf</button>
                    <button onclick="window.print()" class="btn btn-outline-primary"> Print </button>
                </div>
                <div class="col-md-12">
                    <div class="card" id="invoice">
                        <div class="card-header bg-transparent header-elements-inline">
                            <h6 class="card-title text-success"> Statement / Invoice </h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                </div>
                            </div>
                            <div class="d-md-flex flex-md-wrap">
                                <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Statement/Invoice To:</span>
                                    <ul class="list list-unstyled mb-0">
                                        <li>
                                            <h5 class="my-2"><?php echo $row['name'] ?></h5>
                                        </li>
                                        <li><?php echo $row['address'] ?></li>
                                        <li><?php echo $row['phone'] ?></li>
                                        <li><a href="#" data-abc="true"><?php echo $row['email'] ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-lg">
                                <thead>
                                    <tr>
                                        <th> Date </th>
                                        <th> Cleaning Type </th>
                                        <th> Quantity(sqft) </th>
                                        <th> Amount </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><?php echo $row['date'] ?></td>
                                        <td class="text-center"><?php echo $row['type'] ?></td>
                                        <td class="text-center"><?php echo $row['quantity'] ?></td>
                                        <td class="text-center">RM<?php echo $row['total'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body">
                            <div class="d-md-flex flex-md-wrap">
                                <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                                    <h6 class="mb-3 text-left">Total due</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th class="text-left">Total:</th>
                                                    <td class="text-right text-primary">
                                                        <h5 class="font-weight-semibold">RM <?php echo $row['total'] ?></h5>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php }  ?>

<script>
    window.onload = function() {
        document.getElementById("download")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                console.log(invoice);
                console.log(window);
                var opt = {
                    margin: 1,
                    filename: 'Statement.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
</script>

</html>