<?php
class MembersView
{
    public function render($data, $dataClub)
    {
        $no = 1;
        $dataMembers = null;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_club) = $val;
            $nama_club = ''; // Initialize $nama_club with an empty string
            $id_member = $id;
            foreach ($dataClub as $club) {
                list($id, $nama) = $club;
                if ($id == $id_club) {
                    $nama_club = $nama;
                    break;
                }
            }
            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $nama_club . "</td>
                <td>
                <a href='index.php?id_hapus=" . $id_member . "' class='btn btn-danger''>Hapus</a>
                <a href='index.php?editForm=" . $id_member ."' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }

    public function listClub($dataClub)
    {
        $listClub = null;
        foreach ($dataClub as $val) {
            list($id, $nama) = $val;
            $listClub .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/createMember.html");
        $tpl->replace("OPTION", $listClub);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataClub)
    {
        $dataMember = null;
        $clubMember = 0;
        foreach($data as $val)
        {
            list($id, $name, $email, $phone, $join_date, $id_club) = $val;
            if($idMember == $id)
            {
                $dataMember .= 
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='tname' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='temail' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='tphone' value='$phone' class='form-control'> <br>
            ";
            $clubMember = $id_club;
            break;
            }
        }
        
        $listClub = null;
        foreach ($dataClub as $val) {
            list($id, $nama) = $val;
            if($id == $clubMember)
            {
                $listClub .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            }
            else
            {
                $listClub .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("templates/editMember.php");
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("CLUB_MEMBER", $listClub);
        $tpl->write();
    }
}
