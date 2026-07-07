<?php
    require 'fungsi.php';

    $id = $_GET["id"];
    $query = "SELECT * FROM mahasiswa WHERE id = $id";
    $mahasiswa = tampildata($query)[0]; // data spesifik $id

    if (isset($_POST["submit"])) {
        if (editdata($_POST, $id) > 0) {
            echo "<script>
                    alert('Data berhasil diubah!');
                    document.location.href = 'data.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal diubah!');
                    document.location.href = 'data.php';
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <h1 align="center">Edit Data Mahasiswa</h1>

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

    <h2 align="center">Form Data Mahasiswa</h2>

    <form action="" method="POST" align="center">
        <table border="1" align="center" cellpadding="10" cellspacing="0">
            
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $mahasiswa["nama"]; ?>"></td>
            </tr>

            <tr>
                <td>NIM</td>
                <td><input type="number" name="nim" value="<?= $mahasiswa["nim"]; ?>">
            </tr>

            <tr>
                <td>Program Studi</td>
                <td><input type="text" name="prodi" value="<?= $mahasiswa["prodi"]; ?>"></td>
            </tr>

            <tr>
                <td>Email</td>
                <td><input type="email" name="email" value="<?= $mahasiswa["email"]; ?>">
            </tr>

            <tr>
                <td>No HP</td>
                <td><input type="number" name="no_hp" value="<?= $mahasiswa["no_hp"]; ?>"></td>
            </tr>

            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" value="<?= $mahasiswa["foto"]; ?>"></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Edit Data">
                </td>
            </tr>

        </table>
    </form>

</body>
</html>