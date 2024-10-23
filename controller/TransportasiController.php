<?php
include_once __DIR__ . '/../model/transportasi.php';

class TransportasiController {
    private $transportasi;

    public function __construct(){
        $this->transportasi = new Transportasi();
    }

    public function transportasi() {
        header("Location:../data_master/transportasi/index.php");
    } 

    public function getAll() {
        $data = $this->transportasi->getAll();
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function addTransportasi() {
        $data = $this->transportasi->addTransportasi();
        // var_dump($data);
        if($data == true) {
            $_SESSION['sukses'] = "Data Berhasil Disimpan";
            header("Location:../routes/route.php?action=managetransportasi");
        } else {
            $_SESSION['sukses'] = "Data Gagal Disimpan";
            header("Location:../routes/route.php?action=managetransportasi");
        }
    }

    public function showTransportasi($id) {
        header("Location:../data_master/transportasi/update_transportasi.php?action=getTransportasi&id=" . $id);
    }

    public function getOne($id) {
        $data = $this->transportasi->getOne($id);
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function getTransportasiByDestinasi($id) {
        $data = $this->transportasi->getByDestinasi($id);
        if ($data) {
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            echo json_encode([]);
        }
    }

    public function updateTransportasi($id) {
        // var_dump($id);
        $data = $this->transportasi->updateTransportasi($id);
        if($data == true) {
            $_SESSION['sukses'] = "Data Berhasil Terupdate";
            header("Location:../routes/route.php?action=managetransportasi");
        } else {
            $_SESSION['error'] = "Data gagal Terupdate";
            header("Location:../routes/route.php?action=managetransportasi");
        }
    }

    public function deleteTransportasi($id) {
        $transportasi = $this->transportasi->deleteTransportasi($id);
        if($transportasi == true) {
            $_SESSION['sukses'] = "Data Berhasil Terhapus";
            header('Location:../routes/route.php?action=managetransportasi');
        } else {
            $_SESSION['error'] = "Data Gagal Terhapus";
            header("Location:../routes/route.php?action=managetransportasi");
        }
    }

}