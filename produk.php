<div class="container">
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-secondary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Produk
        </button>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th class="w-25">Nama</th>
                        <th class="w-25">Harga</th>
                        <th class="w-25">Jenis</th>
                        <th class="w-25">Stok</th>
                        <th class="w-25">Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM produk";
                    $hasil = $conn->query($sql);

                    $no = 1;
                    while ($row = $hasil->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <strong><?= $row["nama"] ?></strong>                               
                            </td>
                            <td><?= $row["harga"] ?></td>
                            <td><?= $row["jenis"] ?></td>
                            <td><?= $row["stok"] ?></td>
                            <td>
                                <?php
                                if ($row["gambar"] != '') {
                                    if (file_exists('img/' . $row["gambar"] . '')) {
                                ?>
                                        <img src="img/<?= $row["gambar"] ?>" width="100">
                                <?php
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="#" title="edit" class="badge rounded-pill text-bg-success" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>"><i class="bi bi-pencil"></i></a>
                                <a href="#" title="delete" class="badge rounded-pill text-bg-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>"><i class="bi bi-x-circle"></i></a>
                            
                                <!-- Awal Modal Edit -->
                                <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput" class="form-label">Nama</label>
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama Produk" value="<?= $row["nama"] ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="floatingTextarea2">Harga</label>
                                                        <textarea class="form-control" placeholder="Tuliskan Harga Produk" name="harga" required><?= $row["harga"] ?></textarea>
                                                    </div>

                                                        <div class="mb-3">
                                                            <label for="floatingTextarea2">Jenis</label>
                                                            <textarea class="form-control" placeholder="Tuliskan Jenis Produk" name="jenis" required><?= $row["jenis"] ?></textarea>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="floatingTextarea2">Stok</label>
                                                            <textarea class="form-control" placeholder="Tuliskan Stok Produk" name="stok" required><?= $row["stok"] ?></textarea>
                                                        </div>

                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                                                        <input type="file" class="form-control" name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                                                        <?php
                                                        if ($row["gambar"] != '') {
                                                            if (file_exists('img/' . $row["gambar"] . '')) {
                                                        ?>
                                                                <br><img src="img/<?= $row["gambar"] ?>" width="100">
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Edit -->

                                <!-- Awal Modal Hapus -->
                                <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Produk</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus Produk "<strong><?= $row["nama"] ?></strong>"?</label>
                                                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                        <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                                    <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Akhir Modal Hapus -->

                            </td>
                        <td>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- Awal Modal Tambah-->
<div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Tuliskan Nama Produk" required>
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea2">Harga</label>
                        <textarea class="form-control" placeholder="Tuliskan Harga Produk" name="harga" required></textarea>
                    </div>
                    <div class="mb-3">
                     <label for="floatingTextarea2">Jenis</label>
                     <textarea class="form-control" placeholder="Tuliskan Jenis Produk" name="jenis" required></textarea>
                    </div>
                    <div class="mb-3">
                     <label for="floatingTextarea2">Stok</label>
                     <textarea class="form-control" placeholder="Tuliskan Stok Produk" name="stok" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Tambah-->

<?php
include "upload_foto.php";

//jika tombol simpan diklik
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    //upload gambar
    if ($nama_gambar != '') {
        $cek_upload = upload_foto($_FILES["gambar"]);

        if ($cek_upload['status']) {
            $gambar = $cek_upload['message'];
        } else {
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=produk';
            </script>";
            die;
        }
    }

    if (isset($_POST['id'])) {
        //update data
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            //jika tidak ganti gambar
            $gambar = $_POST['gambar_lama'];
        } else {
            //jika ganti gambar, hapus gambar lama
            unlink("img/" . $_POST['gambar_lama']);
        }

        $stmt = $conn->prepare("UPDATE produk 
                                SET 
                                nama =?,
                                harga =?,
                                jenis = ?,
                                stok = ?,
                                gambar = ?
                                WHERE id = ?");

        $stmt->bind_param("sssssi", $nama, $harga, $jenis, $stok, $gambar, $id);
        $simpan = $stmt->execute();
    } else {
		    //insert data
        $stmt = $conn->prepare("INSERT INTO produk (nama,harga,jenis,stok,gambar)
                                VALUES (?,?,?,?,?)");

        $stmt->bind_param("sssss", $nama, $harga, $jenis, $stok, $gambar);
        $simpan = $stmt->execute();
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=produk';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=produk';
        </script>";
    }

    $stmt->close();
    $conn->close();
}

//jika tombol hapus diklik
if (isset($_POST['hapus'])) {
    $id = $_POST['id'];
    $gambar = $_POST['gambar'];

    if ($gambar != '') {
        //hapus file gambar
        unlink("img/" . $gambar);
    }

    $stmt = $conn->prepare("DELETE FROM produk WHERE id =?");

    $stmt->bind_param("i", $id);
    $hapus = $stmt->execute();

    if ($hapus) {
        echo "<script>
            alert('Hapus data sukses');
            document.location='admin.php?page=produk';
        </script>";
    } else {
        echo "<script>
            alert('Hapus data gagal');
            document.location='admin.php?page=produk';
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>