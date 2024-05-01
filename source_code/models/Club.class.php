<?php

class Club extends DB
{
    function getClub()
    {
        $query = "SELECT * FROM club";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['tnama'];
        $tahun_dibuat = $data['ttahun_dibuat'];

        $query = " INSERT INTO `club`(`nama`, `tahun_dibuat`) VALUES ('$nama', '$tahun_dibuat')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM club WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $nama = $data["tnama"];
        $tahun_dibuat = $data["ttahun_dibuat"];
        $id = $data["id_edit"];

        $query = "update club set nama='$nama', tahun_dibuat='$tahun_dibuat' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
