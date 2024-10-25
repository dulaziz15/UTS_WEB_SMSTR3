<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/loading.css">
    <link rel="stylesheet" href="./../css/loginStyle.css">
</head>

<div class="loading-container">
        <i class="fas fa-plane airplane"></i>
        <p>Loading...</p>
    </div>
<body>
    <div class="login-container" style="display: none;">
        <h2>Register</h2>
        <?php
        session_start();
        if (isset($_SESSION["error"])) {
            echo "<span>" . $_SESSION["error"] . "</span>";
        }
        ?>
        <!-- <span>Email atau Password Salah !</span> -->
        <form action="../routes/route.php?action=register" method="post">
            <div class="input-group">
                <label for="">Email</label>
                <input type="email" placeholder="Enter your Email" name="email" required>
            </div>
            <div class="input-group">
                <label for="">Nama</label>
                <input type="text" placeholder="Enter your name" name="nama" required>
            </div>
            <div class="input-group">
                <label for="">Username</label>
                <input type="text" placeholder="Enter your username" name="username" required>
            </div>
            <div class="input-group">
                <label for="">Alamat</label>
                <input type="text" placeholder="Enter your Alamat" name="alamat" required>
            </div>
            <div class="input-group">
                <label for="">Jenis Kelamin</label>
                <select name="janis_kelamin" id="jenis_kelamin">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="input-group">
                <label for="">Password</label>
                <input type="password" placeholder="Enter your Password" name="password" required>
                <input type="number" value="2" name="type" hidden>
            </div>
            <div class="input-group">
                <input type="submit" value="Register" name="submit" id="submit">
            </div>
            <div class="input-group register">
                <p>Sudah memiliki akun ? <a href="register.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</body>
<?php
unset($_SESSION["error"]);
?>
<script>
    setTimeout(function() {
        $(".login-container").css("display", "block");
        $(".loading-container").css("display", "none");
    }, 1000);
</script>

</html>