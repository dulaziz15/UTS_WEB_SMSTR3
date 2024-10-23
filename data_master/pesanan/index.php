<?php
include('../componen/header.php');
?>

<main class="main-content">
    <div class="card-table">
    <h2 class="title-content">Data Pesanan</h2>
    <?php
    if (isset($_SESSION['sukses'])) {
        echo "<span>" . $_SESSION['sukses'] . "</span>";
    } elseif (isset($_SESSION['error'])) {
        echo "<span>" . $_SESSION['error'] . "</span>";
    } elseif (isset($_SESSION['penuh'])) {
        echo "<span>" . $_SESSION['penuh'] . "</span>";
    }
    ?>
    <button class="btn btn-add" id="addDestination"><a href="tambah_pesanan.php">Buat Pesanan</a></button>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Nama Destinasi</th>
                <th>Transportasi</th>
                <th>Quantity</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Attention</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="pesananData">

        </tbody>
    </table>
    </div>
</main>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getPesananAll', // Ensure this path is correct
        success: function(data) {
            console.log(data);
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(pesanan => {
                    tableContent += `
                        <tr>
                        <td>${pesanan.email}</td>
                        <td>${pesanan.nama_destinasi}</td>
                        <td>${pesanan.jenis}</td>
                        <td>${pesanan.quantity}</td>
                        <td>${pesanan[8]}</td>
                        <td><p>${pesanan.status == 1 ? 'Booking' : pesanan.status == 2 ? 'Perjalanan' : 'Selesai'}</p></td>
                        <td>
                            ${
                            pesanan.status == 3 ? '<button class="btn btn-delete-disabled"><a href="" onclick="false">Status telah Selesai !</a></button>' : '<button class="btn btn-disabled"><a href="" onclick="false">Selesaikan Untuk Hapus !</a></button></td>'
                            }
                        </td>
                        <td>
                            ${
                            pesanan.status == 3 ? '<button class="btn btn-delete"><a href="../../routes/route.php?action=deletePesanan&id=' + pesanan.pesanan_id + '">Hapus</a></button>' : '<button class="btn btn-view"><a href="../../routes/route.php?action=showPesanan&id=' + pesanan.pesanan_id + '">Edit</a></button>'
                            }
                        </td>
                        </tr>
                    `;
                });
                $('#pesananData').html(tableContent);
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
unset($_SESSION['sukses']);
unset($_SESSION['error']);
unset($_SESSION['penuh']);
?>
<?php
    include('../componen/footer.php');
?>