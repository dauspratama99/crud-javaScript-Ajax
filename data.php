<table class="table">
    <thead>
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            include 'koneksi.php';
            $data = $koneksi->query("SELECT * FROM tb_user");
              
            foreach($data as $i => $isi):
        ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= $isi['nama_user'] ?></td>
                <td><?= $isi['username_user'] ?></td>
                <td><?= $isi['password_user'] ?></td>
                <td><?= $isi['alamat_user'] ?></td>
                <td> 
                    <button type="button" onclick="edit('<?= $isi['id_user']?>','<?= $isi['nama_user'] ?>','<?= $isi['username_user']?>','<?= $isi['password_user'] ?>','<?= $isi['alamat_user'] ?>')" class="btn btn-warning">Edit</button>
                    <button type="button" onclick="hapus('<?= $isi['id_user'] ?>')" class="btn btn-danger">Hapus</button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>