<?php session_start(); ?>
<?php include "header.php"; ?>

<?php
    $query = "SELECT idbuku, tajuk_buku FROM buku";
    $result = $connect->query($query);
    if($result->num_rows> 0){
        $options=mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<?php
if (isset($_POST['submit'])) {
    $nama_pelajar = $_POST['nama_pelajar'];
    $kelas = $_POST['kelas'];
    $tempoh_pinjaman = $_POST['tempoh_pinjaman'];
    $buku_idbuku = $_POST['buku_idbuku'];
    

    $query = mysqli_query($connect, "INSERT INTO pinjaman (nama_pelajar, kelas, tempoh_pinjaman, buku_idbuku) 
    VALUES('{$nama_pelajar}', '{$kelas}', '{$tempoh_pinjaman}', '{$buku_idbuku}')");

    function function_alert($message){
        echo "<script>alert('$message');</script>";
    }
    function_alert("Tahniah anda telah meminjam buku!");


    if (!$query) {
     echo "Something went wrong" . mysqli_error($con);
    }
}
?>