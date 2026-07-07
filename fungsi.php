<?php
    $koneksi = mysqli_connect("localhost", "root", "", "nraweekly2");
    
    function tampildata($query) {
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function deletedata($id) {
        global $koneksi;
        
        mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
        mysqli_affected_rows($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function tambahdata($data, $files) {
        global $koneksi;

        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $prodi = htmlspecialchars($data["prodi"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $namafoto = $_FILES["foto"]["name"];
        $tmpfoto = $_FILES["foto"]["tmp_name"];

        $newnamafoto = date("dmYHis_") . $namafoto;
        $path = "Assets/" . $newnamafoto;

        if (move_uploaded_file($tmpfoto, $path)) {
        $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto) 
        VALUES ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$newnamafoto')";
        mysqli_query($koneksi, $query);
        }

        return mysqli_affected_rows($koneksi);
    }

    function editdata($data, $id) {
        global $koneksi;

        $nama = htmlspecialchars($data["nama"]);
        $nim = htmlspecialchars($data["nim"]);
        $prodi = htmlspecialchars($data["prodi"]);
        $email = htmlspecialchars($data["email"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $namafoto = $_FILES["foto"]["name"];
        $tmpfoto = $_FILES["foto"]["tmp_name"];
        $path = "Assets/" . $namafoto;

        if (move_uploaded_file($tmpfoto, $path)) {
        }

        $query = "UPDATE mahasiswa SET 
                    nama = '$nama',
                    nim = '$nim',
                    prodi = '$prodi',
                    email = '$email',
                    no_hp = '$no_hp',
                    foto = '$newnamafoto'
                WHERE id = $id";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
?>