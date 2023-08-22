<?php

//panggil koneksi database
include ("inc/koneksi.php");

//enkripsi inputan password lama
$password = md5($_POST['password']);

//panggil username
$username = $_POST['username'];

//uji jika password lama sesuai
$tampil = mysqli_query($koneksi, "SELECT * FROM tb_pengguna WHERE 
                                username = '$username' and password = '$password'");
$data = mysqli_fetch_array($tampil);
//jika data ditemukan, maka password sesuai
if ($data) {
    //uji jika password baru dan konfirmasi password sama
    $password_baru = $_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass'];

    if ($password_baru == $konfirmasi_password) {
        //proses ganti password
        //enkripsi password baru
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($koneksi, "UPDATE tb_pengguna set password = '$pass_ok'  
                                        WHERE id_pengguna = '$data[id_pengguna]' ");
        if ($ubah) {
            echo "<script>alert('Password anda berhasil diubah, silahkan logout untuk menguji password baru anda.!');document.location='index.php'</script>";
        }
    } else {
        echo "<script>alert('Maaf, Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='index.php'</script>";
    }
} else {
    echo "<script>alert('Maaf, Password lama anda tidak sesuai/tidak terdaftar!');document.location='index.php'</script>";
}
?>