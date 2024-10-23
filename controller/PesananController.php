<?php
include_once __DIR__ . '/../model/pesanan.php';
include_once __DIR__ . '/../model/transportasi.php';

class PesananController
{
    private $pesanan;
    private $transportasi;

    public function __construct()
    {
        $this->pesanan = new Pesanan();
        $this->transportasi = new Transportasi();
    }

    public function pesanan()
    {
        header("Location:../data_master/pesanan/index.php");
    }

    public function getAll()
    {
        $data = $this->pesanan->getAll();
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function addPesanan()
    {
        $user = $_POST['user'];
        $transportasi = $_POST['transportasi'];
        $destinasi = $_POST['destinasi'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];
        $data = $this->transportasi->getBiaya($transportasi);
        $updateSlot = $this->transportasi->updateSlot($quantity, $transportasi);
        if ($updateSlot == false) {
            header('Location:../routes/route.php?action=managepesanan');
        } else {
            $biaya = $quantity * $data;
            // var_dump($biaya);
            $result = $this->pesanan->addPesanan($user, $transportasi, $destinasi, $quantity, $biaya, $status);
            if ($result == true) {
                $_SESSION['sukses'] = "Data Berhasil Ditambahkan";
                header('Location:../routes/route.php?action=managepesanan');
            } else {
                $_SESSION['error'] = "Data Gagal Ditambahkan";
                header('Location:../routes/route.php?action=managepesanan');
            }
        }
    }

    public function showPesanan($id)
    {
        header("Location:../data_master/pesanan/update_pesanan.php?action=getPesanan&id=" . $id);
    }

    public function getOne($id)
    {
        $data = $this->pesanan->getOne($id);
        // var_dump($data);
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function updatePesanan($id)
    {
        // var_dump($id);
        $user = $_POST['user'];
        $transportasi = $_POST['transportasi'];
        $destinasi = $_POST['destinasi'];
        $quantityBaru = $_POST['quantity'];
        $status = $_POST['status'];
        $data = $this->transportasi->getBiaya($transportasi);
        $dataQuantityLama = $this->pesanan->getOne($id);
        $quantity = $quantityBaru - $dataQuantityLama['quantity'];
        // var_dump($status);
        $updateSlot = $this->transportasi->updateSlot($quantity, $transportasi);
        if ($updateSlot == false) {
            header('Location:../routes/route.php?action=managepesanan');
        } else {
            if ($status == 3) {
                $this->transportasi->updateStokPesanan($dataQuantityLama);
            }
            $biaya = $quantityBaru * $data;
            // var_dump($biaya);
            $data = $this->pesanan->updatePesanan($user, $transportasi, $destinasi, $quantityBaru, $biaya, $status, $id);
            if ($data == true) {
                $_SESSION['sukses'] = "Data Berhasil Terupdate";
                header('Location:../routes/route.php?action=managepesanan');
            } else {
                $_SESSION['error'] = "Data Gagal Terupdate";
                header('Location:../routes/route.php?action=managepesanan');
            }
        }
    }

    public function deletePesanan($id)
    {
        $data = $this->pesanan->deletePesanan($id);
        if ($data == true) {
            $_SESSION['sukses'] = "Data Berhasil Dihapus";
            header('Location:../routes/route.php?action=managepesanan');
        } else {
            $_SESSION['error'] = "Data Gagal Dihapus";
            header('Location:../routes/route.php?action=managepesanan');
        }
    }

    
    public function addPesananUser($id) {
        $user = $id;
        $transportasi = $_POST['transportasi'];
        $destinasi = $_POST['destinasi'];
        $quantity = $_POST['quantity'];
        $status = 1;
        $data = $this->transportasi->getBiaya($transportasi);
        // var_dump($transportasi);
        $updateSlot = $this->transportasi->updateSlot($quantity, $transportasi);
        if ($updateSlot == false) {
            header('Location:../routes/route.php?action=user');
        } else {
            $biaya = $quantity * $data;
            // var_dump($biaya);
            $result = $this->pesanan->addPesanan($user, $transportasi, $destinasi, $quantity, $biaya, $status);
            if ($result == true) {
                $_SESSION['sukses'] = "Anda Berhasil Booking Travel";
                header('Location:../routes/route.php?action=user');
            } else {
                $_SESSION['error'] = "Anda Gagal Booking Travel, Coba Lagi!";
                header('Location:../routes/route.php?action=user');
            }
        }
    }

    public function getPesananUser($id) {
        // var_dump($id);
        $data = $this->pesanan->getPesananUser($id);
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function deletePesananUser($id) {
        $data = $this->pesanan->deletePesanan($id);
        if ($data == true) {
            $_SESSION['sukses'] = "Data Berhasil Dihapus";
            header('Location:../routes/route.php?action=user');
        } else {
            $_SESSION['error'] = "Data Gagal Dihapus";
            header('Location:../routes/route.php?action=user');
        }
    }

    public function updatePesananUser($id)
    {
        // var_dump($id);
        $transportasi = $_POST['transportasi'];
        $quantityBaru = $_POST['quantity'];
        $status = 1;
        $data = $this->transportasi->getBiaya($transportasi);
        $dataQuantityLama = $this->pesanan->getOne($id);
        $quantity = $quantityBaru - $dataQuantityLama['quantity'];
        // var_dump($status);
        $updateSlot = $this->transportasi->updateSlot($quantity, $transportasi);
        if ($updateSlot == false) {
            header('Location:../routes/route.php?action=managepesanan');
        } else {
            if ($status == 3) {
                $this->transportasi->updateStokPesanan($dataQuantityLama);
            }
            $biaya = $quantityBaru * $data;
            // var_dump($biaya);
            $data = $this->pesanan->updatePesananUser($transportasi,  $quantityBaru, $biaya, $status, $id);
            if ($data == true) {
                $_SESSION['sukses'] = "Data Berhasil Terupdate";
                header('Location:../routes/route.php?action=user');
            } else {
                $_SESSION['error'] = "Data Gagal Terupdate";
                header('Location:../routes/route.php?action=user');
            }
        }
    }
}
