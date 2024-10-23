<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Update Destinasi</h2>
    <form action="../../routes/route.php?action=updateDestinasi&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data">
        Nama
        <input type="text" name="nama" id="nama"><br>
        Daerah
        <input type="text" name="daerah" id="daerah"><br>
        Gambar
        <input type="file" name="img" id="img"><br>
        <input type="submit" value="Tambah">
    </form>
    </div>
    </main>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasi&id=<?=$_GET['id']?>', // Ensure this path is correct
        success: function(data) {
            $('#nama').val(data.nama_destinasi);
            $('#daerah').val(data.daerah);
            $('#img').val(data.img);
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
</script>
<?php
    include('../componen/footer.php');
?>