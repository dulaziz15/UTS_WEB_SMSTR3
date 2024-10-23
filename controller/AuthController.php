<?php
include_once __DIR__ . '/../routes/route.php';
include_once __DIR__ . '/../model/user.php';
session_start();

class AuthController
{
    public function login()
    {
        // var_dump("cek");
        if (isset($_POST['submit'])) {
            $cek_login = new User();
            if ($cek_login->userLogin()) {
                $_SESSION['login'] = $_POST['email'];
                if ($_SESSION['level'] == 1) {
                    // var_dump("cek");
                    header("Location:../routes/route.php?action=dashboard");
                } else {
                    // var_dump("cek");
                    header("Location:../routes/route.php?action=user");
                }
            } else {
                $_SESSION["error"] = "Email atau password salah";
                header("Location:../view/login.php");
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        header("Location:../index.php");
        exit();
    }
}
