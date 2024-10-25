<?php
include('../../data_master/componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2>Update Transportasi</h2>
        <form action="../../routes/route.php?action=updateTransportasi&id=<?= $_GET['id'] ?>" method="post" class="form">
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
                    <select name="destinasi" id="destinasiData">

                    </select>
                </div>
            </div>
            <div class="form-input-submit">
                <input type="submit" value="Update" name="update" id="update">
            </div>
        </form>
    </div>
</main>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getTransportasi&id=<?= $_GET['id'] ?>', // Ensure this path is correct
        success: function(data) {
            console.log(data);
            $('#nama').val(data.jenis);
            $('#biaya').val(data.biaya);
            $('#slot').val(data.slot);
            $('#telp').val(data.telp);
            $('#destinasiData').append(
                `<option value="${data.destinasi_id}">${data.nama_destinasi}</option>`
            );
            $.ajax({
                type: 'GET',
                url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasiAll',
                success: function(data) {
                    console.log(data);
                    if (Array.isArray(data)) {
                        let tableContent = '';
                        data.forEach(destinasi => {
                            tableContent += `
                        <option value="${destinasi.destinasi_id}">${destinasi.nama_destinasi}</option>
                    `;
                        });
                        $('#destinasiData').append(tableContent);
                    } else {
                        console.error("Expected an array but received:", data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
</script>
<?php
include('../componen/footer.php');
?>