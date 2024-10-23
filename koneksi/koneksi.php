<?php

class Koneksi
{
    public function koneksi()
    {
        $serverName = "LAPTOP-60DUFOCJ\SQLEXPRESS";

        try {
            $conn = new PDO("sqlsrv:server=$serverName;database=Travelin");
            return $conn;
        } catch (Exception $e) {
            echo "tidak connect" . $e->getMessage();
        }
    }
}
