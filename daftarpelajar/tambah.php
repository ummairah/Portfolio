<?php include "config.php";?>

<?php
if(isset($_POST['submit'])){
    $nama=$_POST['nama'];
    $no_kp=$_POST['no_kp'];
    $alamat=$_POST['alamat'];
    $nombor_telefon=$_POST['nombor_telefon'];

    $query=mysqli_query($con,"INSERT INTO pelajar(nama,no_kp,alamat,nombor_telefon) VALUES ('{$nama}','{$no_kp}','{$alamat}','{$nombor_telefon}')");

    if(!$query){
        echo "Something went wrong".mysqli_error($con);
    }
    else{
        header('location: index.php');
    }
}
?>

<head>
<style>
.container {
 position: relative;
 width: 50%;
 padding-bottom: 500px;
 margin: 0 auto;
 /* background-color: #04AA6D; */
}


.form {
 position: absolute;
 width: 100%;
 height: 100%;
 top: 0;
 left: 0;
 padding: 15px;
 box-sizing: border-box;
 background-color: green;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  /* display: inline-block; */
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 50%;
    margin-top: 0;
  }
}

.submitButton{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
}

.resetButton{
    background-color: red;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
}
</style>
</head>
<body>

<br><br><br><br><br>
<div class="container">
<center>
<h1>BORANG MAKLUMAT PELAJAR</h1>
</center>

<form action="" method="post">
  <div class="row">
    <div class="col-25">
      <label for="nama">NAMA</label>
    </div>
    <div class="col-75">
      <input type="text" id="nama" name="nama" placeholder="Nama"><br>
    </div>
  </div>
 
  <div class="row">
    <div class="col-25">
      <label for="no_kp">NO KP</label>
    </div>
    <div class="col-75">
      <input type="text" id="no_kp" name="no_kp" placeholder="IC Number">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="alamat">ALAMAT</label>
    </div>
    <div class="col-75">
      <textarea id="alamat" name="alamat" placeholder="Alamat" style="height:200px"></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="nombor_telefon">NO TELEFON</label>
    </div>
    <div class="col-75">
      <input type="text" id="nombor_telefon" name="nombor_telefon" placeholder="Nombor Telefon">
      <br><br>
      <center>
      <button class="submitButton" name="submit" onclick="">Submit</button>
      <button class="resetButton" type="reset" name="reset">Reset</button>
     </center>
    </div>
  </div>
  </form>
</div>

</body>
</html>