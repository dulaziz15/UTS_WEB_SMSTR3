<?php
include_once __DIR__ . '/../koneksi/koneksi.php';
class Pesanan
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new Koneksi;
    }

    public function getAll()
    {
        $query = "SELECT
                        usr.*,       
                        pes.*,        
                        dst.*,        
                        tr.*          
                    FROM 
                        dbo.users AS usr
                    INNER JOIN 
                        dbo.pesanan AS pes ON pes.user_id = usr.user_id
                    INNER JOIN 
                        dbo.distinasi AS dst ON pes.destinasi_id = dst.destinasi_id
                    INNER JOIN 
                        dbo.transportasi AS tr ON dst.destinasi_id = tr.destinasi_id
                    WHERE 
                        usr.user_id  = pes.user_id
                        AND dst.destinasi_id = pes.destinasi_id 
                        AND tr.transportasi_id = pes.transportasi_id; 
                    ";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll();
        // var_dump($result);
        return $result;
    }

    public function addPesanan($user, $transportasi, $destinasi, $quantity, $biaya, $status)
    {
        $query = "INSERT INTO dbo.pesanan (user_id, transportasi_id, destinasi_id, quantity, biaya, status) VALUES ('$user', '$transportasi', '$destinasi', '$quantity', '$biaya', '$status')";
        $data = $this->koneksi->koneksi()->query($query);
        var_dump($query);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getOne($id) {
        $query = "SELECT
                        usr.*,       
                        pes.*,        
                        dst.*,        
                        tr.*          
                    FROM 
                        dbo.users AS usr
                    INNER JOIN 
                        dbo.pesanan AS pes ON pes.user_id = usr.user_id
                    INNER JOIN 
                        dbo.distinasi AS dst ON pes.destinasi_id = dst.destinasi_id
                    INNER JOIN 
                        dbo.transportasi AS tr ON dst.destinasi_id = tr.destinasi_id
                    WHERE 
                        usr.user_id  = pes.user_id
                        AND dst.destinasi_id = pes.destinasi_id 
                        AND tr.transportasi_id = pes.transportasi_id
                        AND pes.pesanan_id = $id
                    ";
        // var_dump($id);
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetch();
        // var_dump($result);
        return $result;
    }

    public function updatePesanan($user, $transportasi, $destinasi, $quantity, $biaya, $status, $id)
    {
        $query = "UPDATE dbo.pesanan SET user_id = '$user', destinasi_id = '$destinasi', biaya = '$biaya', quantity = '$quantity', status = '$status', transportasi_id = '$transportasi' WHERE pesanan_id = '$id'";
        // var_dump($query);
        $data = $this->koneksi->koneksi()->query($query);
        // var_dump($data);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePesanan($id) {
        $query = "DELETE FROM dbo.pesanan WHERE pesanan_id = $id";
        $data = $this->koneksi->koneksi()->query($query);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }

    public function getPesananUser($id) {
        $query = "SELECT
                        usr.*,       
                        pes.*,        
                        dst.*,        
                        tr.*          
                    FROM 
                        dbo.users AS usr
                    INNER JOIN 
                        dbo.pesanan AS pes ON pes.user_id = usr.user_id
                    INNER JOIN 
                        dbo.distinasi AS dst ON pes.destinasi_id = dst.destinasi_id
                    INNER JOIN 
                        dbo.transportasi AS tr ON dst.destinasi_id = tr.destinasi_id
                    WHERE 
                        usr.user_id  = pes.user_id
                        AND dst.destinasi_id = pes.destinasi_id 
                        AND tr.transportasi_id = pes.transportasi_id
                        AND pes.user_id = $id 
                    ";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll();
        // var_dump($result);
        return $result;
    }

    public function updatePesananUser($transportasi, $quantity, $biaya, $status, $id)
    {
        $query = "UPDATE dbo.pesanan SET biaya = '$biaya', quantity = '$quantity', status = '$status', transportasi_id = '$transportasi' WHERE pesanan_id = '$id'";
        // var_dump($query);
        $data = $this->koneksi->koneksi()->query($query);
        // var_dump($data);
        if ($data == true) {
            return true;
        } else {
            return false;
        }
    }
}
