<?php include 'header.php' ?>

<?php
$hantar = mysqli_query($connect, "SELECT * FROM barang WHERE id=" . $_GET['id']);
while ($res = mysqli_fetch_assoc($hantar)) {
?>

<div class="container col-8 border rounded bg-light mt-5" style='--bs-bg-opacity:.5'>

<br>
    <h1> SKYFLY SDN BHD </h1>
    <h3 > Parcel Anda Kami Hantar </h3>
    <br>

    <h4> Terima Kasih <?php echo $res['nama'];?> kerana menggunakan perkhidmatan kami.</h4>
    <h4> Butiran pembayaran ini telah dikirim ke email <?php echo $res['emel'];?> </h4>

    <br>
    <div class="mb-3">
        <h1> Maklumat Pembayaran </h1>
    </div>

    <p> Nama : &nbsp; <?php echo $res['nama'];?> </p>
    <p> Nok KP : &nbsp; <?php echo $res['nokp'];?> </p>
    <p> No HP : &nbsp; <?php echo $res['notel'];?> </p>
    <p> Nama dan Alamat Penerima : &nbsp; <?php echo $res['nama_penerima'];?>&nbsp;<?php echo $res['alamat_penerima'];?> </p>
    <p> Jenis : &nbsp; <?php echo $res['jenis_penghantar'];?> </p>
    <p> Express : &nbsp; <?php echo $res['express'];?> </p>
    <p> Berat : &nbsp; <?php echo $res['berat'];?> </p>
    <p> Jumlah Bayaran : &nbsp; <?php echo $res['jumlah_bayaran'];?> </p>
    <p> Tarikh : &nbsp; <?php echo $res['timestamp'];?> </p>
</div>
<br>
<?php } ?>
