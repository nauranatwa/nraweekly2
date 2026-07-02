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

?>  