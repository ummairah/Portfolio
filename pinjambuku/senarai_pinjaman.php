<?php session_start(); ?>
<?php include "header.php";?>
<?php include "sidebar.php";?>
<style>
<?php include "style.css"; ?>
</style>

<div class="container1 col-5 border rounded bg-light mt-5" style='--bs-bg-opacity:.5'>
<h2 class="text-center">Senarai Pinjaman</h2>
<br>
<div class="mb-4">
<table>
        <tr>
            <th>ID</th>
            <th>Tempoh Pinjaman</th>
            <th>ID Pelajar</th>
            <th>ID Buku</th>
        </tr>
        <?php
        $sql = "SELECT * FROM pinjaman";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>". $row["idpinjaman"] ."</td>";
            echo "<td>". $row["nama_pelajar"] ."</td>";            
            echo "<td>". $row["tempoh_pinjaman"] ."</td>";
            echo "<td>". $row["buku_idbuku"] ."</td>";
            echo "</tr>";
        }
    }
        ?>
    </table>
</div>
</form>
</div>