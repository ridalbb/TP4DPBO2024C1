<?php
class ClubView{
    public function render($data){
    $no = 1;
    $dataClub = null;
    foreach($data as $val){
        list($id, $nama, $tahun_dibuat) = $val;
        $dataClub .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>
                <td>" . $tahun_dibuat . "</td>
                <td>
                <a href='club.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                <a href='./templates/editClub.php?id=" . $id . "&nama=" . $nama . "&tahun_dibuat=" . $tahun_dibuat . "' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }
        $tpl = new Template("templates/club.html");
        $tpl->replace("DATA_TABEL", $dataClub);
        $tpl->write();
    }
}