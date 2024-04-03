<?php

//koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'absensi');

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>