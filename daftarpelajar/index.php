<?php include "config.php"; ?>

<head>
    <style>
            .container {
                position: relative;
                width: 50%;
                padding-bottom: 500px;
                margin: 0 auto;
                /* background-color: #04AA6D; */
                }

            #table {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            #table td, #table th {
                border: 1px solid #ddd;
                padding: 10px;
            }
            
            #table tr:nth-child(even){background-color: #f2f2f2;}
            
            #table tr:hover {background-color: #ddd;}
            
            #table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: seagreen;
                color: white;
            }

            .button{
                background-color: seagreen;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
    </style>
</head>

<br>
<div class="container">
<center><h1>SENARAI PELAJAR</h1></center>
<br>

<table id="table">
    <thead>
        <tr>
            <th>BIL</th>
            <th>NO IC</th>
            <th>NAMA</th>
            <th>ALAMAT</th>
            <th>NO PHONE</th>
            <th>TINDAKAN</th>
        </tr> 
    </thead>
      <?php
         $query = mysqli_query($con, "SELECT * FROM pelajar");
         $bil = 1;
         while ($result=mysqli_fetch_array($query)) {
       ?>
    <tbody>
        <tr>
            <td><?php echo $bil++; ?></td>
            <td><?php echo $result['no_kp']; ?></td>
            <td><?php echo $result['nama']; ?></td>
            <td><?php echo $result['alamat']; ?></td>
            <td><?php echo $result['nombor_telefon']; ?></td>
            <td><a href='padam.php?no_kp=<?php echo $result['no_kp'];?>' 
            onclick="return confirm('Adakah anda pasti untuk padam rekod ini?')">DELETE</a></td>
        </tr>
    </tbody>
    <?php
      }
    ?>
</table>
<br><br>
<center><a href="tambah.php" class="button">Tambah Pelajar</a></center>
</div>
</body>
</html>
