<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Data User</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo "<h3>" . $_SESSION["error"] . "</h3>";
        }
        ?>
        <form action="../../routes/route.php?action=adduser" method="post" class="form">
            <div class="form-container">
                <div class="form-input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama">
                </div>
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-input">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <div class="form-input">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat">
                </div>
                <div class="form-input">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin">
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-input input-select">
                    <label for="type">Type (Role)</label>
                    <select name="type" id="type">
                        <option value="2">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-input-submit">
                <input type="submit" value="Tambah" name="Tambah" id="submit">
            </div>
        </form>
    </div>
</main>
<?php
unset($_SESSION["error"]);
?>
<?php
include('../componen/footer.php');
?>