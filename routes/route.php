<?php
include_once __DIR__ . '/../controller/AuthController.php';
include_once __DIR__ . '/../controller/userController.php';
include_once __DIR__ . '/../controller/DestinasiController.php';
include_once __DIR__ . '/../controller/TransportasiController.php';
include_once __DIR__ . '/../controller/PesananController.php';

$auth = new AuthController();
$user = new UserController();
$destinasi = new DestinasiController();
$transportasi = new TransportasiController();
$pesanan = new PesananController();
$action = (isset($_GET["action"])) ? $_GET["action"] : $_GET["action"] = "login";
$id = isset($_GET["id"]) ? $_GET["id"] : 0;


if (isset($_SESSION['login'])) {
    if ($action == "logout") {
        $auth->logout();
    }
    if ($_SESSION['level'] == 1) {
        if ($action == "adduser") {
            $user->tambah();
        } elseif ($action == "dashboard") {
            $user->dashboard();
        } elseif ($action == "manageuser") {
            $user->manageUser();
        } elseif ($action == "getdata") {
            $user->getAll();
        } elseif ($action == "getone") {
            $user->getOne($id);
        } elseif ($action == "showuser") {
            $user->showUser($id);
        } elseif ($action == "updateuser") {
            $user->updateUser($id);
        } elseif ($action == "deleteuser") {
            $user->deleteUser($id);
        } elseif ($action == "managedestinasi") {
            $destinasi->destinasi();
        } elseif ($action == "getDestinasiAll") {
            $destinasi->getAll();
        } elseif ($action == "addDestinasi") {
            $destinasi->addDestinasi();
        } elseif ($action == "showDestinasi") {
            $destinasi->showDestinasi($id);
        } elseif ($action == "getDestinasi") {
            $destinasi->getOne($id);
        } elseif ($action == "updateDestinasi") {
            $destinasi->updateDestinasi($id);
        } elseif ($action == "deleteDestinasi") {
            $destinasi->deleteDestinasi($id);
        } elseif ($action == "managetransportasi") {
            $transportasi->transportasi();
        } elseif ($action == "getTransportasiAll") {
            $transportasi->getAll();
        } elseif ($action == "addTransportasi") {
            $transportasi->addTransportasi();
        } elseif ($action == "showTransportasi") {
            $transportasi->showTransportasi($id);
        } elseif ($action == "getTransportasi") {
            $transportasi->getOne($id);
        } elseif ($action == "getTransportasiByDestinasi") {
            $transportasi->getTransportasiByDestinasi($id);
        } elseif ($action == "updateTransportasi") {
            $transportasi->updateTransportasi($id);
        } elseif ($action == "deleteTransportasi") {
            $transportasi->deleteTransportasi($id);
        } elseif ($action == "managepesanan") {
            $pesanan->pesanan();
        } elseif ($action == "getPesananAll") {
            $pesanan->getAll();
        } elseif ($action == "addPesanan") {
            $pesanan->addPesanan();
        } elseif ($action == "showPesanan") {
            $pesanan->showPesanan($id);
        } elseif ($action == "getPesanan") {
            $pesanan->getOne($id);
        } elseif ($action == "updatePesanan") {
            $pesanan->updatePesanan($id);
        } elseif ($action == "deletePesanan") {
            $pesanan->deletePesanan($id);
        }
    } elseif (($_SESSION['level'] == 2)) {
        if ($action == "getDestinasiAllUser") {
            $destinasi->getAll();
        } elseif ($action == "getTransportasiUser") {
            // var_dump("cek");
            $transportasi->getTransportasiByDestinasi($id);
        } elseif ($action == "addPesananUser") {
            // var_dump($_POST, $id);
            $pesanan->addPesananUser($id);
        } elseif ($action == "getPesananUser") {
            $pesanan->getPesananUser($id);
        } elseif ($action == "deletePesananUser") {
            $pesanan->deletePesananUser($id);
        } elseif ($action == "editPesananUser") {
            // var_dump("cek");
            $pesanan->getOne($id);
        } elseif ($action == "getTransportasiByDestinasiUser") {
            // var_dump($id);
            $transportasi->getTransportasiByDestinasi($id);
        } elseif ($action == "updatePesananUser") {
            $pesanan->updatePesananUser($id);
        }
    } else {
        header("Location:../page/403.php");
    }
} else {
}
// Role User
if ($action == "user") {
    $user->user();
} elseif ($action == "login") {
    $auth->login();
} elseif ($action == "register") {
    $user->register();
}
