<?php include 'config.php' ?>
<?php include 'header.php' ?>

<style>
<?php include 'style.css' ?>
</style>
<center>
<table>
    <br><br><br>
    <h1> Senarai Nama Penghantar SKYFLY </h1>
    <tr>
        <th> ID </th>
        <th> Nama </th> 
    </tr>

    <?php 
    $display = "SELECT * FROM barang";
    $show = mysqli_query($connect,$display);
    if (mysqli_num_rows($show)> 0) {
        while ($result = mysqli_fetch_assoc($show)) {
            ?>
            <tr>
             <td><?php echo $result['id'] ?> </td>  &nbsp;     
             <td><?php echo $result['nama'] ?></td>  &nbsp;
             <td><button class="btn btn-primary"><a href="paparan.php?id=<?php echo $result['id'] ?>"> View </button> </td>
             <td><button class="btn btn-success"><a href="update.php?id=<?php echo $result['id'] ?>">  Update </button></td>
             <td><button class="btn btn-danger"><a href="delete.php?id=<?php echo $result['id'] ?>"> Delete </button> </td>
             <br>
        </tr>

             <?php
        }
    }
    ?>

</table>    
<br><br>         
<button class="btn btn-warning"> <a href="index.php"> Tambah</button>
</center>        
</center>