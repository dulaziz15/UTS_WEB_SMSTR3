<?php
include('../../data_master/componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2>Update Transportasi</h2>
        <form action="../../routes/route.php?action=updateTransportasi&id=<?= $_GET['id'] ?>" method="post">
            Jenis
            <input type="text" name="nama" id="nama"><br>
            Biaya
            <input type="number" name="biaya" id="biaya"><br>
            Slot
            <input type="number" name="slot" id="slot"><br>
            Telpon
            <input type="number" name="telp" id="telp"><br>
            Destinasi
            <select name="destinasi" id="destinasiData">

            </select><br>
            <input type="submit" value="Submit">
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