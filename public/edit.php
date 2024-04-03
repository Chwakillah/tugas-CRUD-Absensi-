<?php
    require 'koneksi.php';
    require 'fungsi.php';

    if(isset($_GET['no'])) {
        $no = $_GET['no'];
        $data = getDataByNomor($koneksi, $no);
    } else {
        echo "Parameter No tidak diatur.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/output.css">
</head>
<body>
    <section class="container m-8 p-8 mx-auto my-auto bg-abu rounded-lg">
        <form action="edit.php" method="post" class="flex flex-col gap-4">
            <div class="flex flex-col gap-2">
                <input type="hidden" name="no" value="<?= $no ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">NIM</label>
                <input type="text" placeholder="Masukkan NIM Anda" name="NIM" class="p-2 rounded-md" value="<?= $data['NIM'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Nama Mahasiswa</label>
                <input type="text" placeholder="Masukkan Nama Anda" name="nama" class="p-2 rounded-md" value="<?= $data['nama'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Tanggal</label>
                <input type="date" name="tgl" class="p-2 rounded-md" value="<?= $data['tgl'] ?>">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Keterangan</label>
                <select name="keterangan" id="" class="p-2 rounded-md" value="<?= $data['keterangan'] ?>">
                    <option value="Pilih">--Pilih--</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                </select>
            </div>
            <hr class="my-4">
            <div class="text-center flex justify-center items-center">
                <button name="edit" type="submit" class="text-center flex justify-center items-center px-6 py-2 bg-kuneng font-semibold rounded-lg text-blackie">Edit</button>
            </div>
        </form>
    </section>
</body>
</html>