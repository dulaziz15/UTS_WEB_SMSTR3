<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travelin</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js" integrity="sha512-poSrvjfoBHxVw5Q2awEsya5daC0p00C8SKN74aVJrs7XLeZAi+3+13ahRhHm8zdAFbI2+/SUIrKYLvGBJf9H3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/destinasiStyle.css">
</head>

<body>
    <div class="main-container">
        <div class="container">
            <div class="main">
                <div class="logo">
                    <img src="img/logo.png" width="100px" alt="">
                </div>
                <div class="img-billboard">
                    <img src="img/gifsa-garuda-indonesia-repaint-17.png" alt="">
                    <div class="gradient-overlay"></div>
                </div>
                <div class="billboard">
                    <div class="text-billboard">
                        <h2>WUJUDKAN AGENDA LIBURANMU DENGAN AGEN TERPERCAYA</h2>
                        <h1>AGEN TRAVEL TERPECAYA<br> TRAVELIN</h1>
                    </div>
                    <?php
                    session_start();

                    if (!isset($_SESSION['login'])) {
                        echo '<a class="login" href="./view/login.php">LOGIN</a>';
                    } else {
                        echo '<a class="login" href="./routes/route.php?action=logout">LOGOUT</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['login'])) {
        if ($_SESSION['level'] == 2) {
    ?> <div class="container-main">
                <div class="data-pesanan">
                    <table>
                        <thead>
                            <th>Destinasi</th>
                            <th>Transportasi</th>
                            <th>Quantity</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="data-pesanan-user">

                        </tbody>
                    </table>
                </div>
                <div class="container-pesanan" id="pesanan">
                    <div style="display: none;" class="form-pesanan" id="form-pesanan">
                        <h1>Form Pemesanan</h1>
                        <a href="" onclick="backDestinasi()">Lihat Destinasi</a>
                        <form action="routes/route.php?action=addPesananUser&id=<?= $_SESSION['login_id'] ?>" method="POST" id="pesanan-form">
                            Quantity
                            <input type="number" name="quantity" id=""><br>
                            Transportasi
                            <select name="transportasi" id="transportasi">

                            </select><br>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
                <div class="container-pesanan-edit" id="edit-pesanan">
                    <div style="display: none;" class="form-pesanan-update" id="form-pesanan">
                        <h1>Form Edit Pemesanan</h1>
                        <a href="" onclick="backDestinasi()">Lihat Destinasi</a>
                        <form method="POST" id="update-pesanan-form">
                            Quantity
                            <input type="number" name="quantity" id="quantity-update"><br>
                            Transportasi
                            <select name="transportasi" id="transportasi-update">
                                
                            </select><br>
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>
<?php
if (isset($_SESSION['sukses'])) {
    echo "<script>alert(" . $_SESSION['sukses'] . ")</script>";
} elseif (isset($_SESSION['error'])) {
    echo "<script>alert(" . $_SESSION['sukses'] . ")</script>";
} elseif (isset($_SESSION['penuh'])) {
    echo "<script>alert(" . $_SESSION['penuh'] . ")</script>";
}

unset($_SESSION['sukses']);
unset($_SESSION['error']);
?>
<?php
include('js/ajaxIndex.php');
?>