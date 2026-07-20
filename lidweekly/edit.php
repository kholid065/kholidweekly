<?php

require 'fungsi.php';

$id = $_GET["id"];
$data = tampildata("SELECT * FROM mahasiswa WHERE id=$id")[0];

if (isset($_POST['submit']))
{
    if(editdata($_POST, $_FILES, $id) > 0)
    {
        echo "<script>
        alert('Data berhasil di edit!!');
        window.location.href='mahasiswa.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Data gagal di edit!!');
        window.location.href='mahasiswa.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form action="" method="post" enctype="multipart/form-data">
    <table cellpadding="5">

        <tr>
            <td><label for="nama">Nama</label></td>
            <td>:</td>
            <td>
                <input type="text" name="nama" id="nama" value="<?= $data['nama']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><label for="nim">NIM</label></td>
            <td>:</td>
            <td>
                <input type="text" name="nim" id="nim" value="<?= $data['nim']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><label for="prodi">Prodi</label></td>
            <td>:</td>
            <td>
                <input type="text" name="prodi" id="prodi" value="<?= $data['prodi']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><label for="email">Email</label></td>
            <td>:</td>
            <td>
                <input type="email" name="email" id="email" value="<?= $data['email']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><label for="no_hp">No HP</label></td>
            <td>:</td>
            <td>
                <input type="text" name="no_hp" id="no_hp" value="<?= $data['no_hp']; ?>" required>
            </td>
        </tr>

        <tr>
            <td><label for="foto">Foto</label></td>
            <td>:</td>
            <td>
                <input type="file" name="foto" id="foto">
            </td>
        </tr>

        <tr>
            <td colspan="3">
                <button type="submit" name="submit">Simpan</button>
            </td>
        </tr>

    </table>
</form>

</body>
</html>