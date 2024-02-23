<?php session_start(); ?>
<?php include "header.php";?>
<?php include "sidebar.php";?>
<style>
<?php include "style.css"; ?>
</style>

<div class="container1 col-5 border rounded bg-light mt-5" style='--bs-bg-opacity:.5'>
<h2 class="text-center">Senarai Buku</h2>
<br>
<div class="mb-4">
<table>
        <tr>
            <th>ID</th>
            <th>Tajuk Buku</th>
            <th>Tarikh Daftar Buku</th>
            <th>Penulis</th>           
        </tr>
        <?php
        $sql = "SELECT * FROM buku";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>". $row["idbuku"] ."</td>";
            echo "<td>". $row["tajuk_buku"] ."</td>";
            echo "<td>". $row["tarikh_daftar_buku"] ."</td>";
            echo "<td>". $row["penulis_idpenulis"] ."</td>";
            echo "</tr>";
        }
    }
        ?>
    </table>
</div>
</form>
</div>