<?php
include_once __DIR__ . '/../model/destinasi.php';
class DestinasiController {
    
    private $destinasi;

    public function __construct(){
        $this->destinasi = new Destinasi();
    }
    public function destinasi() {
        header("Location:../data_master/destinasi/index.php");
    }

    public function getAll() {
        $data = $this->destinasi->getAll();
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function addDestinasi() {
        $path = "../img/destinasi/";
        $nama = $_FILES['img']['tmp_name'];
        $namaImg = $_FILES['img']['name'];
        $data = $this->destinasi->addDestinasi($namaImg);
        if($data == true) {
            move_uploaded_file($nama, $path.$namaImg);
            $_SESSION['sukses'] = "Data Berhasil Disimpan";
            header("Location:../routes/route.php?action=managedestinasi");
        } else {
            $_SESSION['error'] = "Data Gagal Disimpan";
            header("Location:../routes/route.php?action=managedestinasi");
        }
    }

    public function showDestinasi($id) {
        header("Location:../data_master/destinasi/update_destinasi.php?action=getDestinasi&id=" . $id);
    }

    public function getOne($id) {
        $data = $this->destinasi->getOne($id);
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function updateDestinasi($id) {
        $data = $this->destinasi->updateDestinasi($id);
        if($data == true) {
            $_SESSION['sukses'] = "Data Berhasil Terupdate";
            header('Location:../routes/route.php?action=managedestinasi');
        } else {
            $_SESSION['error'] = "Data Gagal Terupdate";
            header("Location:../routes/route.php?action=managedestinasi");
        }
    }

    public function deleteDestinasi($id) {
        $destinasi = $this->destinasi->deleteDestinasi($id);
        if($destinasi == true) {
            $_SESSION['sukses'] = "Data Berhasil Terhapus";
            header('Location:../routes/route.php?action=managedestinasi');
        } else {
            $_SESSION['error'] = "Data Gagal Terhapus";
            header("Location:../routes/route.php?action=managedestinasi");
        }
    }
}