<div class="sidebar">
    <h3 style="justify-content: center; padding: 20px"><?php echo $_SESSION['username']; ?></h3>
    
    <a href="dashboard_admin.php?idadmin='.$idadmin">Tambah Buku</a>
    <a href="senarai_buku.php?idadmin='.$idadmin">Senarai Buku</a>
    <a href="senarai_pinjaman.php?idadmin='.$idadmin">Senarai Pinjaman</a>

    <a class="active" href="login_admin.php" style="margin-top: 153%">Log Keluar</a>

</div>
<br>