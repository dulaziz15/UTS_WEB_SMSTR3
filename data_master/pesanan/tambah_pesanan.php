<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Tambah Pesanan</h2>
        <?php
        if (isset($_SESSION['sukses'])) {
            echo "<span>" . $_SESSION['sukses'] . "</span>";
        } elseif (isset($_SESSION['error'])) {
            echo "<span>" . $_SESSION['error'] . "</span>";
        }
        ?>
        <form action="../../routes/route.php?action=addPesanan" method="post" class="form">
            <div class="form-container">
                <div class="form-input input-select">
                    <label for="user">User</label>
                    <select name="user" id="user">
                        <option value="kosong">Pilih User</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="destinasi">Destinasi</label>
                    <select name="destinasi" id="destinasi" onChange='getTransportasi()'>
                        <option value="kosong">Pilih Destinasi</option>
                    </select>
                </div>
                <div class="form-input input-select">
                    <label for="transportasi">Transportasi</label>
                    <select name="transportasi" id="transportasi">

                    </select>
                </div>
                <div class="form-input">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity">
                </div>
                <div class="form-input input-select">
                    <label for="status">Status</label>
                    <select name="status" id="status">
                    <option value="1">Booking</option>
                    <option value="2">Perjalanan</option>
                </select>
                </div>
            </div>
            <div class="form-input-submit">
                <input type="submit" value="Tambah" name="submit" id="submit">
            </div>
        </form>
    </div>
</main>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getdata',
        success: function(data) {
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(user => {
                    tableContent += `
                        <option value="${user.user_id}">${user.email}</option>
                    `;
                });
                $('#user').append(tableContent);
            } else {
                console.error("Expected an array but received:", data);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasiAll',
        success: function(data) {
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(destinasi => {
                    tableContent += `
                        <option value="${destinasi.destinasi_id}">${destinasi.nama_destinasi}</option>
                    `;
                });
                $('#destinasi').append(tableContent);
            } else {
                console.error("Expected an array but received:", data);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
</script>
<script>
    function getTransportasi() {
        var destinasi = $('#destinasi').val();
        if (destinasi === "kosong") {
            $('#transportasi').empty();
            $('#transportasi').append('<option value="kosong">Pilih Transportasi</option>');
            return;
        }
        $.ajax({
            type: 'GET',
            url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getTransportasiByDestinasi&id=' + destinasi,
            success: function(data) {
                $('#transportasi').empty();

                if (Array.isArray(data)) {
                    if (data.length > 0) {
                        let tableContent = '<option value="kosong">Pilih Transportasi</option>';
                        data.forEach(transportasi => {
                            tableContent += `
                    <option value="${transportasi.transportasi_id}">${transportasi.jenis}</option>
                `;
                        });
                        $('#transportasi').html(tableContent);
                    } else {
                        $('#transportasi').html('<option value="kosong">Tidak ada transportasi tersedia</option>');
                    }
                } else {
                    $('#transportasi').html('<option value="kosong">Data Transportasi Tidak Tersedia</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed:", status, error);
                $('#transportasi').html('<option value="kosong">Error fetching transportasi</option>');
            }

        });
    }
</script>
<?php
include('../componen/footer.php');
?>