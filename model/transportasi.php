<?php
include_once __DIR__ . '/../koneksi/koneksi.php';

class Transportasi
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new Koneksi();
    }

    public function getAll()
    {
        $query = "SELECT transportasi_id, jenis, biaya, slot, telp, daerah, dst.destinasi_id, nama_destinasi FROM dbo.transportasi as tr INNER JOIN dbo.distinasi as dst ON dst.destinasi_id = tr.destinasi_id";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll();
        return $result;
    }

    public function addTransportasi()
    {
        $nama = $_POST['nama'];
        $biaya = $_POST['biaya'];
        $slot = $_POST['slot'];
        $telp = $_POST['telp'];
        $destinasi = $_POST['destinasi'];
        $query = "INSERT INTO dbo.transportasi (destinasi_id, jenis, biaya, slot, telp) VALUES ('$destinasi', '$nama', '$biaya', '$slot', '$telp')";
        $data = $this->koneksi->koneksi()->query($query);
        // var_dump($data);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getOne($id)
    {
        $query = "SELECT transportasi_id, jenis, biaya, slot, telp, daerah, dst.destinasi_id, nama_destinasi FROM dbo.transportasi as tr INNER JOIN dbo.distinasi as dst ON dst.destinasi_id = tr.destinasi_id WHERE transportasi_id = $id";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetch();
        return $result;
    }

    public function getByDestinasi($id)
    {
        $query = "SELECT * FROM dbo.transportasi WHERE destinasi_id = $id";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll();
        // var_dump($result);
        return $result;
    }

    public function updateTransportasi($id)
    {
        $nama = $_POST['nama'];
        $biaya = $_POST['biaya'];
        $slot = $_POST['slot'];
        $telp = $_POST['telp'];
        $destinasi = $_POST['destinasi'];
        $query = "UPDATE dbo.transportasi SET destinasi_id = $destinasi, jenis = '$nama', biaya = '$biaya', slot = '$slot', telp = '$telp' WHERE transportasi_id = '$id'";
        $data = $this->koneksi->koneksi()->query($query);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteTransportasi($id)
    {
        $query = "DELETE FROM dbo.transportasi WHERE transportasi_id = " . $id;
        $data = $this->koneksi->koneksi()->query($query);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getBiaya($transportasi)
    {
        $query = "SELECT biaya FROM dbo.transportasi WHERE transportasi_id = $transportasi";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetch();
        return $result['biaya'];
    }

    public function updateSlot($quantity, $transportasi)
    {
        $data = $this->getOne($transportasi);
        $slot = $data['slot'] - $quantity;
        // var_dump($transportasi);
        if ($slot < 0) {
            $_SESSION['penuh'] = "Slot Transportasi melebihi kapasitas";
            return false;
        } else {
            $query = "UPDATE dbo.transportasi SET slot = $slot  WHERE transportasi_id = '$transportasi'";
            $data = $this->koneksi->koneksi()->query($query);
            if ($data == true) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function updateStokPesanan($transportasi)
    {
        $transportasi_id = $transportasi[16];
        $data = $this->getOne($transportasi_id);
        $slotData = $data['slot'];
        $quantity = $transportasi['quantity'];
        $slot = (int)$slotData + (int)$quantity;
        // var_dump($slot);
        if ($slot < 0) {
            $_SESSION['penuh'] = "Slot Transportasi melebihi kapasitas";
            return false;
        } else {
            $query = "UPDATE dbo.transportasi SET slot = $slot  WHERE transportasi_id = '$transportasi_id'";
            $data = $this->koneksi->koneksi()->query($query);
            if ($data == true) {
                return true;
            } else {
                return false;
            }
        }
    }
}
