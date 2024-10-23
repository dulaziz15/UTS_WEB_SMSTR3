<?php
include('../componen/header.php');
?>
<main class="main-content">
    <div class="card-container">
        <div class="card">
            <div class="card-image">
                <img src="../../img/4922654_2517809.jpg" alt="Wisata Malam di Malang">
                <div class="overlay">
                    <button class="button-dashboard"><a href="../../routes/route.php?action=manageuser">Manage User</a></button>
                </div>
            </div>
            <div class="card-details">
                <h3>Data User</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="../../img/39477.jpg" alt="Wisata Malam di Malang">
                <div class="overlay">
                <button class="button-dashboard"><a href="../../routes/route.php?action=managedestinasi">Manage Destinasi</a></button>
                </div>
            </div>
            <div class="card-details">
                <h3>Data Destinasi</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="../../img/garuda.jpg" alt="Wisata Malam di Malang">
                <div class="overlay">
                <button class="button-dashboard"><a href="../../routes/route.php?action=managetransportasi">Manage Transportasi</a></button>
                </div>
            </div>
            <div class="card-details">
                <h3>Data Transportasi</h3>
            </div>
        </div>
        <div class="card">
            <div class="card-image">
                <img src="../../img/tiket-pesawat.jpg" alt="Wisata Malam di Malang">
                <div class="overlay">
                <button class="button-dashboard"><a href="../../routes/route.php?action=managepesanan">Manage Pesanan</a></button>
                </div>
            </div>
            <div class="card-details">
                <h3>Data Pesanan</h3>
            </div>
        </div>
    </div>
</main>
</div>
    <?php
    include('../componen/footer.php');
    ?>