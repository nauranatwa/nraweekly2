<?php
require 'fungsi.php';

$query = "SELECT * FROM mahasiswa";
$mahasiswas = tampildata($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<h1 align="center">Data</h1>

<table border="1" align="center" cellpadding="10" cellspacing="0">
    <tr>
        <td><a href="index.php">Home</a></td>
        <td><a href="biodata.php">Biodata</a></td>
        <td><a href="contact.php">Contact</a></td>
        <td><a href="data.php">Data</a></td>
        <td><a href="students.php">Students</a></td>
    </tr>
</table>

<br><br>

<h2 align="center">Data</h2>
<a href="students.php"><button>Add Data</button>
</a>

<table border="1" align="center" cellpadding="5">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Program Studi</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Foto</th>
        <th>Action</th>
    </tr>

    <?php
    $no = 1;
    foreach ($mahasiswas as $mahasiswa) :
    ?>

    <tr>
        <td><?= $no; ?></td>
        <td><?= $mahasiswa["nama"]; ?></td>
        <td><?= $mahasiswa["nim"]; ?></td>
        <td><?= $mahasiswa["prodi"]; ?></td>
        <td><?= $mahasiswa["email"]; ?></td>
        <td><?= $mahasiswa["no_hp"]; ?></td>
        <td>
            <img src="<?= $mahasiswa["foto"]; ?>" width="100">
        </td>
        <td>
            <a href="editdata.php?id=<?= $mahasiswa["id"]; ?>">
                <button>Edit</button>
            </a>

            <a href="deletedata.php?id=<?= $mahasiswa["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?')">
                <button>Delete</button>
            </a>
        </td>
    </tr>

    <?php
    $no++;
    endforeach;
    ?>

</table>

<br><br>

<table border="1" align="center" cellpadding="10" cellspacing="0">
    <tr>
        <td>1,1</td>
        <td>1,2</td>
        <td>1,3</td>
        <td>1,4</td>
    </tr>
    <tr>
        <td>2,1</td>
        <td rowspan="2" colspan="2"></td>
        <td>2,4</td>
    </tr>
    <tr>
        <td>3,1</td>
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
</html>