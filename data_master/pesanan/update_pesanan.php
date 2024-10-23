<?php
include('../componen/header.php');
?>

<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Update Pesanan</h2>
        <form action="../../routes/route.php?action=updatePesanan&id=<?= $_GET['id'] ?>" method="post">
            User
            <select name="user" id="user">
                <option value=""></option>
            </select><br>
            Destinasi
            <select name="destinasi" id="destinasi" onChange='getTransportasi()'>
                <option value=""></option>
            </select><br>
            Transportasi
            <select name="transportasi" id="transportasi">
                <option value=""></option>
            </select><br>
            Quantity
            <input type="number" name="quantity" id="quantity"><br>
            Status
            <select name="status" id="status">
                <option value="1">Booking</option>
                <option value="2">Perjalanan</option>
                <option value="3">Selesai</option>
            </select><br>
            <input type="submit" value="Update">
        </form>
    </div>
</main>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getPesanan&id=<?= $_GET['id'] ?>', 
        success: function(data) {
            console.log(data);
            $('#user').html(`<option value="${data.user_id}">${data.email}</option>`);
            $('#destinasi').html(`<option value="${data.destinasi_id}">${data.nama_destinasi}</option>`);
            $('#transportasi').html(`<option value="${data.transportasi_id}">${data.jenis}</option>`);
            $('#quantity').val(data.quantity);
            $('#status').append(`<option value="${data.status}" selected>${data.status == 1 ? 'Booking' : data.status == 2 ? 'Perjalanan' : 'Selesai'}</option>`);

        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed:", status, error);
        }
    });
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
            url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getTransportasiByDestinasi&id=' + destinasi, // Ensure this path is correct
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