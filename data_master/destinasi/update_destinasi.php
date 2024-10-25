<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Update Destinasi</h2>
        <form action="../../routes/route.php?action=updateDestinasi&id=<?= $_GET['id'] ?>" method="post" enctype="multipart/form-data" class="form">
            <div class="form-container">
                <div class="form-input">
                    <label for="nama">Nama Destinasi</label>
                    <input type="text" name="nama" id="nama">
                </div>
                <div class="form-input">
                    <label for="daerah">Daerah</label>
                    <input type="text" name="daerah" id="daerah">
                </div>
                <div class="form-input">
                    <label for="img">Gambar</label>
                    <input type="file" name="img" id="img">
                </div>
            </div>
            <div class="form-input-submit">
                <input type="submit" value="Tambah" name="Tambah" id="submit">
            </div>
        </form>
    </div>
</main>
<?php
include('../componen/footer.php');
?>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasi&id=<?= $_GET['id'] ?>',
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