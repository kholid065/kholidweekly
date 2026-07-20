<?php
$konek = mysqli_connect("localhost", "root", "", "lidweekly");

function tampildata($query)
{
    global $konek;

    $result = mysqli_query($konek, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function hapusdata($id)
{
    global $konek;

    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}

function tambahdata($data)
{
    global $konek;

    $nama  = htmlspecialchars($data["nama"]);
    $nim   = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $foto  = htmlspecialchars($data["foto"]);

    $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto)
              VALUES ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$foto')";

    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}

function editdata($data, $files, $id)
{
    global $konek;

    $nama  = htmlspecialchars($data["nama"]);
    $nim   = htmlspecialchars($data["nim"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    $namafoto = $files["foto"]["name"];
    $tmpfoto = $files["foto"]["tmp_name"];

    if ($namafoto != "") {
        $path = "assets/image/$namafoto";
        move_uploaded_file($tmpfoto, $path);

        $query = "UPDATE mahasiswa
                  SET
                  nama='$nama',
                  nim='$nim',
                  prodi='$prodi',
                  email='$email',
                  no_hp='$no_hp',
                  foto='$namafoto'
                  WHERE id='$id'";
    } else {
        $query = "UPDATE mahasiswa
                  SET
                  nama='$nama',
                  nim='$nim',
                  prodi='$prodi',
                  email='$email',
                  no_hp='$no_hp'
                  WHERE id='$id'";
    }

    mysqli_query($konek, $query);

    return mysqli_affected_rows($konek);
}
?>