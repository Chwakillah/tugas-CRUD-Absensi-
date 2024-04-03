<?php
require 'koneksi.php';

if(isset($_POST['simpan'])){
    $NIM = $_POST['NIM'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $keterangan = $_POST['keterangan'];

    $cek_data = mysqli_query($koneksi, "SELECT * FROM daftarhadir WHERE NIM='$NIM' AND tgl='$tgl'");
    if(mysqli_num_rows($cek_data) > 0){
        echo '
        <script>
            alert("Anda tidak boleh absen 2x");
            window.location.href = "./index.php"; 
        </script>
        ';
    }else{
        $insert = mysqli_query($koneksi, "insert into daftarhadir (NIM,nama,tgl,keterangan) values ('$NIM','$nama', '$tgl', '$keterangan')");

        if($insert){
            echo '
            <script>
                alert ("Absensi berhasil, data anda tercatat hari ini");
                window.location.href = "./index.php"; 
            </script>
            '; 
        }else{
            echo '
            <script>
                alert ("Absensi gagal, coba lagi");
                window.location.href = "./index.php"; 
            </script>
            ';
        }
    }
}

function getDataByNomor($koneksi, $no) {
    $query = "SELECT * FROM daftarhadir WHERE no = '$no'";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}

function editData($koneksi, $no, $NIM, $nama, $tgl, $keterangan) {
    $query = "UPDATE daftarhadir SET NIM = '$NIM', nama = '$nama', tgl = '$tgl', keterangan = '$keterangan' WHERE no = '$no'";
    $result = mysqli_query($koneksi, $query);
    return $result;
}

if(isset($_POST['edit'])){
    $no = $_POST['no'];
    $NIM = $_POST['NIM'];
    $nama = $_POST['nama'];
    $tgl = $_POST['tgl'];
    $keterangan = $_POST['keterangan'];

    $status = editData($koneksi, $no, $NIM, $nama, $tgl, $keterangan);

    if($status){
        echo '
        <script>
            alert("Data berhasil diperbarui.");
            window.location.href = "./index.php"; 
        </script>
        ';
    }else{
        echo '
        <script>
            alert("Gagal memperbarui data.");
            window.location.href = "./index.php"; 
        </script>
        ';
    }
}

function hapusRecord($koneksi, $no) {
    $query = "DELETE FROM daftarhadir WHERE no = '$no'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
if (isset($_GET['no']) && isset($_GET['hapus'])) {
    $no = $_GET['no'];
    $status = hapusRecord($koneksi, $no);
    if ($status) {
        echo '
        <script>
            alert("Data berhasil dihapus");
            window.location.href = "./index.php"; 
        </script>
        ';
    } else {
        echo "Gagal menghapus data Anda, coba lagi.";
    }
}
?>