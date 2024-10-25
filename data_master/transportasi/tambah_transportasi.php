<?php
include('../../data_master/componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2>Tambah Transportasi</h2>
        <form action="../../routes/route.php?action=addTransportasi" method="post" class="form">
            <div class="form-container">
                <div class="form-input">
                    <label for="nama">Jenis Kendaraan</label>
                    <input type="text" name="nama" id="nama">
                </div>
                <div class="form-input">
                    <label for="biaya">Biaya</label>
                    <input type="number" name="biaya" id="biaya">
                </div>
                <div class="form-input">
                    <label for="slot">Slot</label>
                    <input type="number" name="slot" id="slot">
                </div>
                <div class="form-input">
                    <label for="telepon">No. Telepon</label>
                    <input type="number" name="telp" id="telp">
                </div>
                <div class="form-input input-select">
                    <label for="destinasi">Destinasi</label>
                    <select name="destinasi" id="destinasi">

                    </select>
                </div>
            </div>
            <div class="form-input-submit">
                <input type="submit" value="Tambah" name="Tambah" id="submit">
            </div>
        </form>
    </div>
</main>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasiAll', // Ensure this path is correct
        success: function(data) {
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(destinasi => {
                    tableContent += `
                        <option value=${destinasi.destinasi_id}>${destinasi.nama_destinasi}</option>
                    `;
                });
                $('#destinasi').html(tableContent);
            } else {
                console.error("Expected an array but received:", data);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
</script>
<?php
include('../componen/footer.php');
?>