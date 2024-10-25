<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Destinasi</h2>
        <h1>Tambah Destinasi</h1>
        <form action="../../routes/route.php?action=addDestinasi" method="post" enctype="multipart/form-data" class="form">
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
include('../componen/footer.php')
?>