<?php
include_once __DIR__ . '/../model/user.php';
class UserController
{
    private $user;

    public function __construct(){
        $this->user = new User();
    }

    public function tambah()
    {
        // cek uniq email
        $validate = $this->user->validate_email();
        if ($validate == true) {
            // jika uniq
            $tambah = $this->user->tambahUser();
            // jika data berhasil ditambahkan
            if ($tambah == true) {
                header("Location:../routes/route.php?action=manageuser");
            } else {
                $_SESSION['error'] = "data gagal di upload";
                header("Location:../data_master/user/tambah_user.php");
            }
        } else {
            // jika email duplikat
            header("Location:../data_master/user/tambah_user.php");
        }
    }

    public function dashboard() {
        header("Location:../data_master/dashboard/index.php");
    }

    public function user() {
        header("Location:../index.php#container-main");
    }

    public function manageUser() {
        header("Location:../data_master/user/index.php");
    }

    public function getAll()  {
        $user = $this->user->getAll(); 
        if ($user) {
            header('Content-Type: application/json');
            echo json_encode($user);
        } else {
            echo json_encode([]);
        }
    }

    public function getOne($id) {
        $user = $this->user->getOne($id); 
        if ($user) {
            header('Content-Type: application/json');
            echo json_encode($user);
        } else {
            echo json_encode([]);
        }
    }

    public function showUser($id) {
        header("Location:../data_master/user/update_user.php?id=" . $id);
    }
    
    public function updateUser($id) {
        $user = $this->user->updateUser($id);
        if($user == true) {
            $_SESSION['berhasil'] = "Data Berhasil terupdate";
            header('Location:../routes/route.php?action=manageuser');
        } else {
            $_SESSION['gagal'] = "Data Gagal terupdate";
            header("Location:../routes/route.php?action=manageuser");
        }
    }

    public function deleteUser($id) {
        $user = $this->user->deleteUser($id);
        if($user == true) {
            $_SESSION['berhasil'] = "Data Berhasil Terhapus";
            header('Location:../routes/route.php?action=manageuser');
        } else {
            $_SESSION['gagal'] = "Data Gagal Terhapus";
            header("Location:../routes/route.php?action=manageuser");
        }
    }

}
