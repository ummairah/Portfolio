<?php session_start(); ?>
<?php include "header.php"; ?>
<style>
    <?php include "dashboard.css"; ?>
</style>

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

<body>
<br><br><br><br>


<div class="container col-8 border rounded mt-3 bg-light">
    <h4 class="mt-3 text-center">Selamat Datang ke Sistem Pinjam Buk</h4>
    <hr>
<br>
    <form action="" method="post">
        <div class="input-group mb-4">
            <span class="input-group-text">Nama Pelajar</span>
            <input type="text" class="form-control" name="nama_pelajar" placeholder="Nama Penuh Pelajar" required>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Kelas</span>
            <input type="text" name="kelas" class="form-control" placeholder="2DVM DKA" required>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Tempoh Pinjaman(hari)</span>
            <input type="integer" name="tempoh_pinjaman" class="form-control" placeholder="6" required>
        </div>

        <div class="input-group mb-4">
            <span class="input-group-text">Buku</span>
            <select name="buku_idbuku" class="form-select" id="" required>
                <option value="">Pilihan  buku</option>
                <?php
                foreach ($options as $option){
                ?>
                <option value="<?php echo $option['idbuku']; ?>"><?php echo $option['tajuk_buku']; ?> </option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <center><button type="submit" name="submit" class="btn btn-success"> Save </button>
            </center>
        </div>
    </form>
</div>
</body>
