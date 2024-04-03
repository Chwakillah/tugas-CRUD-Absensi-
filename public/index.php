<?php
    require 'koneksi.php';
    require 'fungsi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data SIREG 4B</title>
    <link rel="stylesheet" href="./css/output.css">
</head>
<body>
    <nav class="container m-8 p-8 mx-auto bg-abu rounded-lg">
        <div class="text-center flex justify-center flex-col">
            <h1 class="text-darkRed text-4xl font-bold mb-4">ABSENSI ANAK SIREG 4B YANG MASUK MK PWEB2</h1>
            <p class="font-semibold text-blackie text-2xl">Dosen Pembimbing: Bapak M. Husni Syahbani</p>
        </div>
    </nav>
    <section class="container mx-auto m-4 p-8 bg-abu rounded-lg">
        <form action="./fungsi.php" method="post" class="flex flex-col gap-4">
            <div class="flex flex-col gap-2">
                <label for="">NIM</label>
                <input type="text" placeholder="Masukkan NIM Anda" name="NIM" class="p-2 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Nama Mahasiswa</label>
                <input type="text" placeholder="Masukkan Nama Anda" name="nama" class="p-2 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Tanggal</label>
                <input type="date" name="tgl" class="p-2 rounded-md">
            </div>
            <div class="flex flex-col gap-2">
                <label for="">Keterangan</label>
                <select name="keterangan" id="" class="p-2 rounded-md">
                    <option value="Pilih">--Pilih--</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Izin">Izin</option>
                </select>
            </div>
            <hr class="my-4">
            <div class="text-center flex justify-center items-center">
                <button name="simpan" type="submit" class="text-center flex justify-center items-center px-6 py-2 bg-darkRed font-semibold rounded-lg text-abu">Simpan</button>
            </div>
        </form>
    </section>
    <section class="container m-8 p-8 mx-auto bg-abu rounded-lg">
        <div class="text-center flex justify-center flex-col">
            <h1 class="text-darkRed text-4xl font-bold mb-4">DATA ABSENSI</h1>
            <div>
                <table class="mx-auto">
                    <tr class="p-4 bg-darkRed rounded-md">
                        <th class="px-6 py-4 text-abu">No</th>
                        <th class="px-6 py-4 text-abu">NIM</th>
                        <th class="px-6 py-4 text-abu">Nama</th>
                        <th class="px-6 py-4 text-abu">Tanggal</th>
                        <th class="px-6 py-4 text-abu">Keterangan</th>
                        <th class="px-6 py-4 text-abu">Aksi</th>
                    </tr>
                    <?php
                    $nomor = 1;
                    $query_absensi = "SELECT * FROM daftarhadir ORDER BY no DESC";
                    $result_absensi = mysqli_query($koneksi, $query_absensi);
                    while($data = mysqli_fetch_assoc($result_absensi)) {
                    ?>
                    <tr class="p-4">
                        <td class="px-6 py-4"><?= $nomor++ ?></td>
                        <td class="px-6 py-4"><?= $data['NIM'] ?></td>
                        <td class="px-6 py-4"><?= $data['nama'] ?></td>
                        <td class="px-6 py-4"><?= $data['tgl'] ?></td>
                        <td class="px-6 py-4"><?= $data['keterangan'] ?></td>
                        <td class="flex gap-4 text-center justify-center items-center align-middle px-6 py-4">
                            <a href="./edit.php?no=<?= $data['no'] ?>" class="px-6 py-2 bg-kuneng rounded-md text-blackie">Edit</a>
                            <a href="index.php?no=<?= $data['no']?>&hapus=1" class="px-6 py-2 bg-darkRed rounded-md text-abu" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>