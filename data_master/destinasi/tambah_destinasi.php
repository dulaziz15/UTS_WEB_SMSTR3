<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Destinasi</h2>
        <h1>Tambah Destinasi</h1>
        <form action="../../routes/route.php?action=addDestinasi" method="post" enctype="multipart/form-data">
            Nama
            <input type="text" name="nama"><br>
            Daerah
            <input type="text" name="daerah"><br>
            Gambar
            <input type="file" name="img"><br>
            <input type="submit" value="Tambah">
        </form>
    </div>
</main>
<?php
include('../componen/footer.php')
?>