<?php include "config.php";

$query = mysqli_query($con, "DELETE FROM pelajar WHERE no_kp =".$_GET['no_kp']);

if($query) {
    echo "<script>alert('Rekod Berjaya Dipadam');
    window.location='index.php';</script>";
}
?>
