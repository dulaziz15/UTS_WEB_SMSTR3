<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi</title>
    <link rel="stylesheet" href="../../css/adminDestinasiStyle.css">
    <link rel="stylesheet" href="../../css/destinasiStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.2/jquery.min.js" integrity="sha512-poSrvjfoBHxVw5Q2awEsya5daC0p00C8SKN74aVJrs7XLeZAi+3+13ahRhHm8zdAFbI2+/SUIrKYLvGBJf9H3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <nav class="navbar">
        <button class="toggle-sidebar" id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <h1>TRAVELIN</h1>
    </nav>
    <div class="container">
        <aside class="sidebar" id="sidebar">
            <img src="../../img/logo.png" width="130px" alt="">
            <p>Selamat Datang <?= $_SESSION['login'] ?></p>
            <ul>
                <li class="warna <?php echo strpos($current_url, 'manageuser') !== false ? 'active' : ''; ?>">
                    <a href="../../routes/route.php?action=dashboard">Dashboard</a>
                </li>
                <li class="warna <?php echo strpos($current_url, 'manageuser') !== false ? 'active' : ''; ?>">
                    <a href="../../routes/route.php?action=manageuser">Data User</a>
                </li>
                <li class="warna <?php echo strpos($current_url, 'managedestinasi') !== false ? 'active' : ''; ?>">
                    <a href="../../routes/route.php?action=managedestinasi">Data Destinasi</a>
                </li>
                <li class="warna <?php echo strpos($current_url, 'managetransportasi') !== false ? 'active' : ''; ?>">
                    <a href="../../routes/route.php?action=managetransportasi">Data Transportasi</a>
                </li>
                <li class="warna <?php echo strpos($current_url, 'managetransportasi') !== false ? 'active' : ''; ?>">
                    <a href="../../routes/route.php?action=managepesanan">Data Pesanan</a>
                </li>
            </ul>
            <a href="../../routes/route.php?action=logout" class="logout">Logout</a>
        </aside>