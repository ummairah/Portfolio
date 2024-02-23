<?php 

    include('config.php');


    $query = mysqli_query($connect, "DELETE FROM pelajar WHERE No_KP =".$_GET['No_KP']);
    
    if ($query) {
        echo "<script>alert('Padam Berjaya');
        window.location='index.php';</script>";
    }


?>