<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Destinasi</h2>
        <?php
        if (isset($_SESSION['sukses'])) {
            echo "<span>" . $_SESSION['sukses'] . "</span>";
        } elseif (isset($_SESSION['error'])) {
            echo "<span>" . $_SESSION['error'] . "</span>";
        }
        ?>
        <button class="btn btn-add" id="addDestination"><a href="tambah_destinasi.php">Tambah Destinasi</a></button>
        <table>
            <thead>
                <tr>
                    <th>Nama Destinasi</th>
                    <th>Daerah Destinasi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="destinasiData">

            </tbody>
        </table>
    </div>
</main>
</div>
<?php
unset($_SESSION['sukses']);
unset($_SESSION['error']);
?>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getDestinasiAll', // Ensure this path is correct
        success: function(data) {
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(destinasi => {
                    tableContent += `
                        <tr>
                        <td>${destinasi.nama_destinasi}</td>
                        <td>${destinasi.daerah}</td>
                        <td><img src="../../img/destinasi/${(destinasi.img != null) ? destinasi.img + '"' : '"' + 'Image Kosong'}" class="img-table"></td>
                        <td>
                            <button class="btn btn-view"><a href="../../routes/route.php?action=showDestinasi&id=${destinasi.destinasi_id}">Edit</a></button>
                            <button class="btn btn-delete"><a href="../../routes/route.php?action=deleteDestinasi&id=${destinasi.destinasi_id}">Hapus</a></button>
                        </td>
                        </tr>
                    `;
                });
                $('#destinasiData').html(tableContent);
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