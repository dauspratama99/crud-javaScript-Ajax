<?php
     
     include 'koneksi.php';
     $iduser = $_POST['iduser'];
     $nama = $_POST['nama'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $alamat = $_POST['alamat'];

     if($iduser == '')
     {
         $simpan = $koneksi->query("INSERT INTO tb_user ( nama_user, username_user, password_user, alamat_user) VALUES ('$nama','$username','$password','$alamat')");
     }
     else
     {
         $simpan = $koneksi->query("UPDATE tb_user set nama_user='$nama', username_user='$username', password_user='$password', alamat_user='$alamat' where id_user='$iduser'");
     }

     if($simpan == TRUE){
         echo json_encode(['pesan' => 'Success']);
     } else{
         echo json_encode(['pesan' => 'Error']);
     }
?>