<?php include 'config.php' ?>
<?php include 'header.php'?>
<style>
<?php include 'style.css' ?>
</style>

<?php 
$query = mysqli_query($connect, "SELECT * FROM barang WHERE id");
?>


<?php 
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $hantar = mysqli_query($connect,"DELETE FROM barang WHERE id = $id");


    if ($hantar) {
        header('location:dashboard.php');
    }

}
?>
