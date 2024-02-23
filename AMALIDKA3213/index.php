<?php include"config.php"; ?>
<style>
<?php include "style.css"; ?>
</style>

<body>
    <div class="container">
        <center>
        <h1> SENARAI PELAJAR </h1>
        <table style="width: 75%;">
            <tr>
                <th> BIL </th>
                <th> NO IC </th>
                <th> NAMA </th>
                <th> ALAMAT </th>
                <th> NO TELEFON </th>
                <th> TINDAKAN </th>
            </tr>
            <?php 
            $display = mysqli_query($connect,'SELECT * FROM pelajar');
            $bil = 1;
            while ($result=mysqli_fetch_array($display)) {	
				?>
				
				<tr>
				<td align='center'><?php echo $bil++ ?></td>
				<td align='center'><?php echo $result['no_kp'] ?></td>
				<td align='center'><?php echo $result['nama'] ?></td>
				<td align='center'><?php echo $result['alamat'] ?></td>
				<td align='center'><?php echo $result['nombor_telefon'] ?></td>
				<td align='center'><a href='padam.php?No_KP=<?php echo $result['No_KP']; ?>" onClick="return confirm('Adakah anda pasti untuk memadam rekod ini?')"> HAPUS </a></td>
				</tr>

                <?php } ?>
        </table>
        <h3><a href="tambah.php"> Tambah Pelajar </a></h3>
</div>
</body>
</html>