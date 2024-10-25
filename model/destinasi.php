<?php
include_once __DIR__ . '/../koneksi/koneksi.php';

class Destinasi {

    private $koneksi;

    public function __construct(){
        $this->koneksi = new Koneksi();
    }

    public function getAll() {
        $query = "SELECT * FROM dbo.distinasi";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll();
        return $result;
    }

    public function addDestinasi($namaImg) {
        $nama = $_POST['nama'];
        $daerah = $_POST['daerah'];
        $img = $namaImg;
        $query = "INSERT INTO dbo.distinasi (nama_destinasi, daerah, img) VALUES ('$nama', '$daerah', '$img')";
        $data = $this->koneksi->koneksi()->query($query);
        if($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getOne($id) {
        $query = "SELECT * FROM dbo.distinasi WHERE destinasi_id = $id";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetch();
        return $result;
    }

    public function updateDestinasi($id) {
        $nama = $_POST['nama'];
        $daerah = $_POST['daerah'];
        $img = $_FILES['img'];
        if(empty($img['name'])) {
            $query = "UPDATE dbo.distinasi SET nama_destinasi = '$nama', daerah = '$daerah' 
                    WHERE destinasi_id = $id";
            // var_dump($query);
            $data = $this->koneksi->koneksi()->query($query);
            if($data == true) {
                return true;
            } else {
                return false;
            }
        } else {
            $path = "../img/destinasi/";
            $namaImgSementara = $_FILES['img']['tmp_name'];
            $namaImg = $_FILES['img']['name'];
            move_uploaded_file($namaImgSementara, $path.$namaImg);
            $query = "UPDATE FROM dbo.distinasi SET nama_destinasi = '$nama', 
                        daerah = '$daerah', img = '$namaImg' WHERE destinasi_id = $id";
            $data = $this->koneksi->koneksi()->query($query);
            if($data == true) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function deleteDestinasi($id) {
        $query = "DELETE FROM dbo.distinasi WHERE destinasi_id = " . $id;
        $data = $this->koneksi->koneksi()->query($query);
        if($data == true) {
            return true;
        } else {
            return false;
        }
    }
}