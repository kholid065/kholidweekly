<?php

    $koneksi=mysqli_connect("localhost", "root" , "",
    "lidweekly");

    $query = "SELECT * FROM mahasiswa";

    $result = mysqli_query($koneksi, $query);

?>


<!DOCTYPE php>

<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
 <body>
       <h1 align="center">
            SELAMAT DATANG
        </h1>
         <table border="1" align="center" cellspacing="0" cellpadding="1">
            <tr>
               <td><a href="index.php">home</a></td>
               <td><a href="kholid.php">profile</a></td>
               <td><a href="curhat.php">cerita</a></td>
                <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
            </tr>
        </table>
        <br></br>
        <div class="table-wrapper">
        <div class="table-header">
            <a href="tambahdata.php">
                <button class="btn">tambah data</button>
            </a>
        </div>
        <h2>Data Mahasiswa</h2>
        <table align="center" border="1" cellpadding="5px">
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>nim</th>
                <th>prodi</th>
                <th>email</th>
                <th>no hp</th>
                <th>foto</th>
            </tr>
            
            <?php while($mhs = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $mhs['id']?></td>
                <td><?= $mhs['nama']?></td>
                <td><?= $mhs['nim']?></td>
                <td><?= $mhs['prodi']?></td>
                <td><?= $mhs['email']?></td>
                <td><?= $mhs['no_hp']?></td>
                <td><img src="assets/image/download (1).jpg" alt="Foto rusdi" width="80px"></td>
                
            </tr><?php } ?>
        </table>
        <h2 align="center">Latihan</h2>
        <table class="tabel-latihan" align="center" border="2" cellspacing="10px">
            <tr>
                <td>1,1</td>
                <td>1,2</td>
                <td>1,3</td>
                <td>1,4</td>
            </tr>
            <tr>
                <td>2,1</td>
                <td colspan="2" rowspan="2" align="center">?</td>
                <!-- <td></td> -->
                <td>2,4</td>
            </tr>
            <tr>
                <td>3,1</td>
                <!-- <td>3,2</td> -->
                <!-- <td></td> -->
                <td>3,4</td>
            </tr>
            <tr>
                <td>4,1</td>
                <td>4,2</td>
                <td>4,3</td>
                <td>4,4</td>
            </tr>
        </table>
        </body>
</php>