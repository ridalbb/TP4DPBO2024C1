<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $id_club = $data['tid_club'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`, `id_club`) VALUES ('$name', '$email', '$phone', '$id_club')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {
        $name = $data["tname"];
        $email = $data["temail"];
        $phone = $data["tphone"];
        $id_club = $data['tid_club'];
        $id = $data["id_edit"];
        
        $query = "update members set name='$name', email='$email', phone='$phone', id_club='$id_club' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
