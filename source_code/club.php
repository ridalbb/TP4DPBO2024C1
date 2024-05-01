<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Club.controller.php");

$club = new ClubController();

if (isset($_POST['add'])) {
    //memanggil add
    $club->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $club->delete($id);
}
else if (isset($_POST['edit'])) {
    $club->edit($_POST);
}
else{
    $club->index();
}

