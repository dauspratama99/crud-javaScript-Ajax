<?php

    include 'koneksi.php';

    $id = $_GET['id'];

    $hapus = $koneksi->query("DELETE FROM tb_user WHERE id_user=$id");

    echo json_encode($hapus);

?>