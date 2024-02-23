<?php include"config.php"; ?>
<style>
<?php include "style.css"; ?>
</style>

<?php
if(isset($_POST['submit'])) {
    $Nama = $_POST['Nama'];
    $No_KP = $_POST['No_KP'];
    $Alamat = $_POST['Alamat'];
    $Nombor_Telefon = $_POST['Nombor_Telefon'];

    $query = mysqli_query($connect, "INSERT INTO pelajar(Nama,No_KP,Alamat,Nombor_Telefon) VALUES ('{$Nama}','{$No_KP}' , '{$Alamat}', '{$Nombor_Telefon}')");

    if($query) {
        echo header('location: index.php');
    }
}
?>

<form method="post">
    <div class="container">
        <center>
        <h1>BORANG MAKLUMAT PELAJAR </h1>
        <label> NAMA : </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="Nama" style="width: 12%; height: 5%;">
        <br><Br>
        <label> NO KP : </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="No_KP" style="width: 12%; height: 5%;">
        <br><br>
        <label> ALAMAT : </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <textarea name="Alamat" style="width: 20%; height: 5%;"></textarea>
        <br><br>
        <label> NO TELEFON : </label> &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name="Nombor_Telefon" style="width: 12%; height: 5%;">    
    </div>
    <br><br>
    <div>
        <center>
        <button type="submit" name="submit"> Submit </button>
        <button type="reset"> Reset </button>
    </div>

</form>