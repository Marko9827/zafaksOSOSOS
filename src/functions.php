<?php




function tpl($what, $page_title)
{
    include ROOT . "/templates/$what.php";
}
function loged()
{
    if (isset($_SESSION['indeks'])) {
        return true;
    } else {
        return false;
    }
}

function Specific($what, $hmm, $id)
{

    if ($hmm == "administracija") {
        $sql = query("SELECT * FROM users WHERE indeks = $_SESSION[indeks] ");
    } else if ($hmm == "predmet") {
        $sql = query("SELECT * FROM `predmeti` WHERE `predmeti`.`id_predmeta` = $id");
    } else if ($hmm == "ispit") {
        $sql = query("SELECT * FROM `aktivniispiti` WHERE `aktivniispiti`.`id_predmeta` = $id");
    } else {
        $sql = query("SELECT * FROM users WHERE indeks = $_SESSION[indeks] ");
    }
    if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)) {
            return $row[$what];
        }
    }
}

function query($sql)
{
    global $con;

    try {
        $ex = mysqli_query($con, $sql);
        if ($ex) {
            return $ex;
        }
    } catch (Exception $e) {
    }
    return false;
}

function table_ispiti($sql2)
{
    $tr = "";
    if (!empty($sql2)) {
        if ($sql2 == "ispiti_od_studenta") {
            $query = "SELECT * FROM `student_predmet` WHERE `student_predmet`.`id_studenta` = $_SESSION[indeks]";
        }

        $sql = query($query);
        if (mysqli_num_rows($sql)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $sql_H = query("SELECT * FROM `predmeti` WHERE `predmeti`.`id_predmeta` = $row[id_predmeta]");

                if (mysqli_num_rows($sql_H)) {
                    while ($row_H = mysqli_fetch_assoc($sql_H)) {
                        $tr  .= "<tr>
                <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row[Profesor]</th>
             <th>". Specific("K1", "ispit",$row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
                          <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>

              
             <th>Zaključna ocena</th>
             <th>Prijavi ispit</th>
                </tr>";
                    }
                }
            }
        }
    }
    return $tr;
}

function menu($active, $type)
{
    $arr2 = json_decode(file_get_contents("./templates/navBar_tpl.json"));
    $strl = "";
    foreach ($arr2 as $value) {
        if ($type == "left") {
            $strl .= "<li> <a href='$value->href'   ><span class='$value->icon'></span> $value->title </a> </li>";
        } else {
            $strl .= "<li> <a href='$value->href'  class='dropdown-item' ><span class='$value->icon'></span> $value->title </a> </li>";
        }
    }

    return $strl;
}

/*

<li>
                 <a><span class="icon_b"></span> Početna</a>
             </li>
             <li>
                 <a><span class="icon_b"></span> Stara obaveštenja</a>
             </li>
             <li>
                 <a><span class="bi icon_b bi-box-arrow-right"></span> Odjavi se</a>
             </li>

             */