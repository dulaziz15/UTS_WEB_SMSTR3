<?php
include('../../data_master/componen/header.php');
?>
<main class="main-content">
<div class="card-table">
    <h2 class="title-content">Data User</h2>
    <?php
    if (isset($_SESSION['berhasil'])) {
        echo "<span>" . $_SESSION['berhasil'] . "</span>";
    } elseif (isset($_SESSION['gagal'])) {
        echo "<span>" . $_SESSION['gagal'] . "</span>";
    }
    ?>
    <button class="btn btn-add" id="addDestination"><a href="tambah_user.php">Tambah User</a></button>
    <table>
        <thead>
            <tr>
                <th>Email</th>
                <th>Username</th>
                <th>type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="userData">

        </tbody>
    </table>
    </div>
</main>
</div>
<?php
unset($_SESSION['berhasil']);
unset($_SESSION['gagal']);
?>
<script>
    $.ajax({
        type: 'GET',
        url: '/PRAKTIKUM%20DESAIN%20DASAR%20PEMROGRAMAN%20WEB/UTS/routes/route.php?action=getdata',
        success: function(data) {
            if (Array.isArray(data)) {
                let tableContent = '';
                data.forEach(user => {
                    tableContent += `
                        <tr>
                        <td>${user.email}</td>
                        <td>${user.username}</td>
                        <td>
                        ${user.type == 1 ? 'Admin' : user.type == 2 ? 'User' : 'Tidak terdeteksi'}</td>
                        <td>
                            <button class="btn btn-view"><a href="../../routes/route.php?action=showuser&id=${user.user_id}">Edit</a></button>
                            <button class="btn btn-delete"><a href="../../routes/route.php?action=deleteuser&id=${user.user_id}">Hapus</a></button>
                        </td>
                        </tr>
                    `;
                });
                $('#userData').html(tableContent);
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