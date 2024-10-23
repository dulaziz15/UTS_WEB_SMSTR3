<?php
include('../../data_master/componen/header.php');
?>
<main class="main-content">
<div class="card-table">
    <h2 class="title-content">Data Transportasi</h2>
    <?php
    if (isset($_SESSION['sukses'])) {
        echo "<span>" . $_SESSION['sukses'] . "</span>";
    } elseif (isset($_SESSION['error'])) {
        echo "<span>" . $_SESSION['error'] . "</span>";
    }
    ?>
    <button class="btn btn-add" id="addDestination"><a href="tambah_transportasi.php">Tambah Transportasi</a></button>
    <table>
        <thead>
            <tr>
                <th>Jenis Transportasi</th>
                <th>Nama Destinasi</th>
                <th>Daerah</th>
                <th>Biaya</th>
                <th>Slot</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="transportasiData">

        </tbody>
    </table>
    </div>
</main>
</div>
<?php
unset($_SESSION['sukses']);
unset($_SESSION['error']);
?>

</html>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getTransportasiAll', // Ensure this path is correct
        success: function(data) {
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(transportasi => {
                    tableContent += `
                        <tr>
                        <td>${transportasi.jenis}</td>
                        <td>${transportasi.nama_destinasi}</td>
                        <td>${transportasi.daerah}</td>
                        <td>${transportasi.biaya}</td>
                        <td>${transportasi.slot}</td>
                        <td>${transportasi.telp}</td>
                        <td>
                            <button class="btn btn-view"><a href="../../routes/route.php?action=showTransportasi&id=${transportasi.transportasi_id}">Edit</a></button>
                            <button class="btn btn-delete"><a href="../../routes/route.php?action=deleteTransportasi&id=${transportasi.transportasi_id}">Hapus</a></button>
                        </td>
                        </tr>
                    `;
                });
                $('#transportasiData').html(tableContent);
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
include('../componen/footer.php')
?>