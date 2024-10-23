<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-table">
        <h2 class="title-content">Data User</h2>
        <?php
        if (isset($_SESSION["error"])) {
            echo "" . $_SESSION["error"] . "";
        }
        ?>
        <form action="../../routes/route.php?action=adduser" method="post">
            nama
            <input type="text" name="nama"><br>
            username
            <input type="text" name="username"><br>
            email
            <input type="email" name="email"><br>
            alamat
            <input type="text" name="alamat"><br>
            jenis kelamin
            <input type="text" name="jenis_kelamin"><br>
            password
            <input type="password" name="password"><br>
            <input type="submit" value="Tambah">
        </form>
    </div>
</main>
<?php
unset($_SESSION["error"]);
?>
<?php
include('../componen/footer.php');
?>