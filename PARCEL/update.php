<?php
include "header.php";
?>

<?php 
$id=$_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM barang WHERE id = $id");
$res=mysqli_fetch_assoc($query);
?>


<?php
if (isset($_POST['update'])){
    $nama=$_POST['nama'];
    $nokp=$_POST['nokp'];
    $notel=$_POST['notel'];
    $emel=$_POST['emel'];
    $nama_penerima=$_POST['nama_penerima'];
    $alamat_penerima=$_POST['alamat_penerima'];
    $jenis_penghantar=$_POST['jenis_penghantar'];
    $express=$_POST['express'];
    $berat=$_POST['berat'];
    $jumlah_bayaran=0;

    if ($jenis_penghantar == "Dalam Negeri") {
        if ($berat  < 8 ) {
            $jumlah_bayaran =  6;
        }else if ($berat > 8 && 21) {
            $jumlah_bayaran = 11;
        }else {
            $jumlah_bayaran= ($berat - 30) + 20;
        }
      }

    if ($jenis_penghantar == "Antarabangsa") {
        if ($berat  < 16 ) {
            $jumlah_bayaran =  6;
        }else if ($berat > 8 && 21) {
            $jumlah_bayaran = 20;
        }else {
            $jumlah_bayaran= (1.5 * ($berat - 30) + 35);
        }   
    }

    switch ($express) {
        case 'Ya':
            $jumlah_bayaran = $jumlah_bayaran * ($jumlah_bayaran + 0.10);
            break;
    }

    $query= mysqli_query($connect,"UPDATE barang SET nama='$nama' , nokp='$nokp' , notel='$notel' , emel='$emel', nama_penerima='$nama_penerima', alamat_penerima='$alamat_penerima', jenis_penghantar='$jenis_penghantar', express='$express', berat='$berat', jumlah_bayaran='$jumlah_bayaran' WHERE id = '$id'");

      if (!$query){
          echo "Something went wrong".mysqli_error($connect);
    } else {
        header('location: dashboard.php');
    }
}

    

?>

<body>
    <br>
<div class="container" style='width: 500px;'>

<form action="" method="post">
  <h1>SKYFLY SDN BHD</h1>
  <h6>Parcel Anda Kami Hantar</h6>
  <input type="hidden" value="<?php echo $res['id'] ?>" >

  <div class="mb-3 mt-3">
    <label for="nama" class="form-label">Nama:</label>
    <input type="nama" class="form-control" value="<?php echo $res['nama'] ?>" id="nama" placeholder="Enter Name" name="nama">
  </div>

  <div class="mb-3">
    <label for="nokp" class="form-label">No Kad Pengenalan:</label>
    <input type="nokp" class="form-control" value="<?php echo $res['nokp'] ?>" id="nokp" placeholder="Enter IC" name="nokp">
  </div>

  <div class="mb-3">
    <label for="notel" class="form-label">No HP:</label>
    <input type="notel" class="form-control" value="<?php echo $res['notel'] ?>" id="notel" placeholder="Enter Phone No" name="notel">
  </div>

  <div class="mb-3">
    <label for="emel" class="form-label">Email:</label>
    <input type="emel" class="form-control" value="<?php echo $res['emel'] ?>" id="emel" placeholder="Enter Email" name="emel">
  </div>

  <div class="mb-3">
    <label for="name_penerima" class="form-label">Nama dan Alamat Penerima:</label>
    <input type="nama_penerima" class="form-control" value="<?php echo $res['nama_penerima'] ?>" id="nama_penerima" placeholder="Enter Recipient" name="nama_penerima"><br>
    <input class="form-control" name="alamat_penerima" value="<?php echo $res['alamat_penerima'] ?>" placeholder="Enter Recipient Address" rows="3">
  </div>


  <!-- buat camni untuk express -->
  <div class="mb-3">
    <label for="jenis_penghantar" class="form-label">Jenis Penghantaran:</label>
    <select class="form-select" value="<?php echo $res['jenis_penghantar'] ?>" name="jenis_penghantar">
  <option value="Dalam Negeri">Dalam Negeri</option>
  <option value="Antarabangsa">Antarabangsa</option>
</select>
  </div>

  <div class="mb-3">
    <label for="express" class="form-label">Express:</label>
    <select class="form-select" value="<?php echo $res['express'] ?>"name="express">
  <option value="Ya">Ya</option>
  <option value="Tidak">Tidak</option>
</select>
  </div>

  <div class="mb-3">
    <label for="berat" class="form-label">Masukkan Jumlah Berat(kg):</label>
    <input type="berat" class="form-control" value="<?php echo $res['berat'] ?>" id="berat" placeholder="Enter parcel weight" name="berat">
  </div>

  <button type="submit" name="update" class="btn btn-primary">Update</button>
  <br><br>
</form>

</body>