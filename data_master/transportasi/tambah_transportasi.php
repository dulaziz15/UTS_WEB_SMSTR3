<?php
include('../../data_master/componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2>Tambah Transportasi</h2>
        <form action="../../routes/route.php?action=addTransportasi" method="post">
            Jenis
            <input type="text" name="nama"><br>
            Biaya
            <input type="number" name="biaya"><br>
            Slot
            <input type="number" name="slot"><br>
            Telpon
            <input type="number" name="telp"><br>
            Destinasi
            <select name="destinasi" id="destinasi">

            </select><br>
            <input type="submit" value="Submit">
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