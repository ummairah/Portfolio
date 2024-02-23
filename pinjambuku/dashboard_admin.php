<?php session_start(); ?>
<?php include "header.php";?>

<style>
<?php include "style.css"; ?>
</style>


<?php
    $query = "SELECT idpenulis, nama_penulis FROM penulis";
    $result = $connect->query($query);
    if($result->num_rows> 0){
        $options=mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>

<?php
if (isset($_POST['tambah'])) {
    $tajuk_buku = $_POST['tajuk_buku'];
    $tarikh_daftar_buku = $_POST['tarikh_daftar_buku'];
    $penulis_idpenulis = $_POST['idpenulis']; 

    $query = mysqli_query($connect, "INSERT INTO buku (tajuk_buku, tarikh_daftar_buku, penulis_idpenulis) VALUES('{$tajuk_buku}', '{$tarikh_daftar_buku}', '{$penulis_idpenulis}')");

    if (!$query) {
        echo "Something went wrong" . mysqli_error($connect);
    }else {
        header('location: dashboard_admin.php');
    }
}
?>

<?php include "sidebar.php";?>

<div class="container col-5 border rounded bg-light mt-5" style='--bs-bg-opacity:.5'>
<h2 class="text-center">Tambah Buku</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for ="tajuk_buku" class="form-label">Tajuk Buku :</label>
        <input type="text" class="form-control" name="tajuk_buku" id="" placeholder="Masukkan Nama Buku" required>
    </div>
    <div class="mb-3">
        <label for ="tarikh_daftar_buku" class="form-label">Tarikh Daftar Buku :</label>
        <input type="date" class="form-control" name="tarikh_daftar_buku" id="" required>
    </div>
    <div class="mb-3">
            <label for ="penulis" class="form-label">Penulis :</label>
            <select name="idpenulis" class="form-select" id="" required>
                <option value="">Pilih Penulis :</option>
                <?php
                foreach ($options as $option){
                ?>
                <option value="<?php echo $option['idpenulis']; ?>"><?php echo $option['nama_penulis']; ?>
            </option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-4">
            <center><button type="submit" name="tambah" class="btn btn-success"> Tambah Buku </button>
            </center>
        </div>
</form>
</div>