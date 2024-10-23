<?php
include_once __DIR__ . '/../koneksi/koneksi.php';

class User
{
    private $koneksi;
    
    public function __construct()
    {
        $this->koneksi = new Koneksi();
    }

    public function userLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $submit = $_POST['submit'];
        $query = "Select * from dbo.users where email = '" . $email . "' and password = '" . $password . "'";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetch();
        if (empty($result)) {
            return false;
        } else {
            session_start();
            $_SESSION['level'] = $result['type'];
            $_SESSION['login_id'] = $result['user_id'];
            return true;
        }
    }

    public function tambahUser()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $type = 2;
        $query = "INSERT INTO dbo.users (email, password, type, username) VALUES ('$email', '$password', '$type', '$username')";
        $data = $this->koneksi->koneksi()->query($query);
        if ($data = true) {
            return true;
        } else {
            return false;
        }
    }

    public function validate_email()
    {
        $email = $_POST["email"];
        $username = $_POST['username'];
        $query = "SELECT * FROM dbo.users where email = '" . $email . "'";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll();
        if (empty($result)) {
            $queryusername = "SELECT * FROM dbo.users where username = '" . $username . "'";
            $datausername = $this->koneksi->koneksi()->query($queryusername);
            $resultusername = $datausername->fetchAll();
            if(empty($resultusername)) {
                return true;
            } else {
                $_SESSION['error'] = "Username sudah terpakai";
                return false;
            }
        } else {
            $_SESSION['error'] = "Email sudah terpakai";
            return false;
        }
    }

    public function getAll() {
        $query = "SELECT * FROM dbo.users";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOne($id) {
        $query = "SELECT * FROM dbo.users where user_id = " . $id . "";
        $data = $this->koneksi->koneksi()->query($query);
        $result = $data->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateUser($id) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $type = $_POST['type'];
        $username = $_POST['username'];
        $queryUpdate = "UPDATE dbo.users SET email = '$email', password = '$password', type = '$type', username = '$username' WHERE user_id = '$id'";
        $dataupdate = $this->koneksi->koneksi()->query($queryUpdate);
        if($dataupdate == true) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id) {
        $query = "DELETE FROM dbo.users WHERE user_id = " . $id;
        $data = $this->koneksi->koneksi()->query($query);
        if($data == true) {
            return true;
        } else {
            return false;
        }
    }
}
