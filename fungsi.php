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

    function tambahdata($data) {
        global $koneksi;
        $id = $data["id"];
        $nama =htmlspecialchars($data["nama"]);
        $nama = $data["nama"];
        $nim = $data["nim"];
        $prodi = $data["prodi"];
        $email = $data["email"];
        $no_hp = $data["no_hp"];
        $foto = $data["foto"];

        $query = "INSERT INTO mahasiswa (nama, nim, prodi, email, no_hp, foto) 
        VALUES ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$foto')";

        mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }
?>