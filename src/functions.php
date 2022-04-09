<?php


function moneyH()
{
    $sql = query("SELECT * FROM racun WHERE indeks = $_SESSION[indeks]");
    $ggg = 0;
    if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $ggg = intval($row["money"]);
        }
    }
    return $ggg;
}

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

    $ggg = "";
    if ($hmm == "administracija") {
        $sql = query("SELECT * FROM users WHERE indeks = $_SESSION[indeks] ");
    } else if ($hmm == "predmet") {
        $sql = query("SELECT * FROM `predmeti` WHERE `predmeti`.`id_predmeta` = $id");
    } else if ($hmm == "ispit") {
        $sql = query("SELECT * FROM `aktivniispiti` WHERE `aktivniispiti`.`id_predmeta` = $id");
    } else if ($hmm == "upisi") {
        $sql = query("SELECT * FROM `upisi` WHERE `upisi`.`stuednt_id` = $id");
    } else if ($hmm == "studenti") {
        $sql = query("SELECT * FROM `studenti` WHERE `studenti`.`id` = $id");
    } else if ($hmm == "prijavljeni_ispiti") {
        $sql = query("SELECT * FROM `prijavljeni_ispiti` WHERE `prijavljeni_ispiti`.`id_predmeta` = $id AND `prijavljeni_ispiti`.`indeks` = $_SESSION[indeks]");
    } else {
        $sql = query("SELECT * FROM users WHERE indeks = $_SESSION[indeks] ");
    }
    if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $ggg = $row[$what];
        }
    }
    return $ggg;
}


function names($lm)
{
    $lmh = "p_$lm";
    $arr = array(
        "p_home" => "Početna",
        "p_notify" => "Obaveštenja",
        "p_mojiPredmeti" => "Moji predmeti",
        "p_prijavaIspita" => "Prijava ispita",
        "p_administracija" => "Administracija",
        "p_upisi" => "Upisi",
        "p_ispiti" => "Ispiti",
        "p_info"=>"Info",
        "p_modProfesora"=>"Mod profesora"
    );
    return $arr[$lmh];
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

function student($what)
{
    $tr = "";
    $query = "SELECT * FROM `studenti` WHERE `studenti`.`indeks` = $_SESSION[indeks]";
    $sql = query($query);
    if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)) {
            $tr = $row[$what];
        }
    }
    return $tr;
}
function upisi(){
    $sql = query("SELECT * FROM `upisi` WHERE `upisi`.`stuednt_id` = $_SESSION[user_id]");
    $tr = "";
    if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)) {
                 $tr  .= "<tr>
             <th>" . Specific("username", "studenti", $row["stuednt_id"]) . "</th>
             <th>" . Specific("Godina_upisa", "upisi", $row["stuednt_id"]) . "</th>
             <th>" . Specific("kojiPut", "upisi", $row["stuednt_id"]) . "</th>
             <th>" . Specific("vreme_upisa", "upisi", $row["stuednt_id"]) . "</th>
             <th>" . Specific("sta_je_upisao", "upisi", $row["stuednt_id"]) . "</th>           
             </tr>";
      
            }
        }
 
    return $tr;
}
function table_ispiti($sql2)
{
    $tr = "";
    if (!empty($sql2)) {
        if ($sql2 == "ispiti_od_studenta") {
            $query = "SELECT * FROM `student_predmet` WHERE `student_predmet`.`id_studenta` = $_SESSION[indeks]";
        }
        if ($sql2 == "prijavljeni") {
            $query = "SELECT * FROM `prijavljeni_ispiti` WHERE `prijavljeni_ispiti`.`indeks` =  $_SESSION[indeks]";
        }
        if ($sql2 == "ispiti_profesor"){
            $query = "SELECT * FROM `prijavljeni_ispiti`";

        }
        if ($sql2 == "prijavi") {
            $query = "SELECT * FROM `student_predmet` WHERE `student_predmet`.`id_studenta` = $_SESSION[indeks]";
        }
        if ($sql2 == "upisi") {
            $query = "SELECT * FROM `upisi` WHERE `upisi`.`stuednt_id` = $_SESSION[user_id]";
        }
        $sql = query($query);
        if (mysqli_num_rows($sql)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                if ($sql2 == "upisi") {
                    $tr  .= "<tr>
             <th>" . Specific("username", "", $row["stuednt_id"]) . "</th>
             <th>" . Specific("Godina_upisa", "upisi", $row["stuednt_id"]) . "</th>
             <th>" . Specific("kojiPut", "upisi", $row["stuednt_id"]) . "</th>
             <th>" . Specific("vreme_upisa", "upisi", $row["stuednt_id"]) . "</th>
             <th>" . Specific("sta_je_upisao", "upisi", $row["stuednt_id"]) . "</th>           
             </tr>";
                } else {
                    $sql_H = query("SELECT * FROM `predmeti` WHERE `predmeti`.`id_predmeta` = $row[id_predmeta]");

                    if (mysqli_num_rows($sql_H)) {
                        while ($row_H = mysqli_fetch_assoc($sql_H)) {
                            if ($sql2 == "prijavljeni") {
                                $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . $row['brojPrijava'] . "</th>
                         <th><button type='button' class='btn btn-danger' title='Mod profesora!!! U sledećim verzijama biće posebno!' onclick='odjaviIspit(`$row[id_predmeta]`)'><i class='bi bi-trash-fill'></i> Odjavi Ispit(Kao profesor)</button></th>

           
             </tr>";
                            } else if ($sql2 == "ispiti_od_studenta") {
                                $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . $row['brojPrijava'] . "</th>
            
           
             </tr>";
                            }
                            else if ($sql2 == "ispiti_profesor"){
                                $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("prijavljeni_ispiti", "brojPrijava", $row['id_predmeta']) . "</th>
            
           
             </tr>";
                            }
                            else if ($sql2 == "prijavi") {
                                $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("prijavljeni_ispiti", "brojPrijava", $row['id_predmeta']) . "</th>
            
             <th><button type='button' class='btn btn-primary' onclick='prijaviIspit(`$row[id_predmeta]`)'>Prijavi</button></th>
          
             </tr>";
                            } else if ($sql2 == "prijaviIspit") {
                                $int = 0;
                                $int =   intval("$row[brojPrijava]");
                                $int++;
                                $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("prijavljeni_ispiti", "brojPrijava", $row['id_predmeta']) . "</th>
            
             <th><button type='button' class='btn btn-primary' onclick='prijaviIspit(`$row[id_predmeta]`)'>Prijavi</button></th>
          
             </tr>";
                            } else {
                                $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("prijavljeni_ispiti", "brojPrijava", $row['id_predmeta']) . "</th>
            
             <th><button type='button' class='btn btn-primary' onclick='prijaviIspit(`$row[id_predmeta]`)'>Prijavi</button></th>
          
             </tr>";
                            }
                        }
                    }
                }
            }
        }
    }
    return $tr;
}
function vecPrijavljenIspit($id)
{
    $sql = query("SELECT * FROM `prijavljeni_ispiti` WHERE `prijavljeni_ispiti`.`id_predmeta` = '$id' AND `prijavljeni_ispiti`.`indeks` = $_SESSION[indeks]");
    $ggg = false;
    if (mysqli_num_rows($sql) > 0) {
        $ggg = true;
    }

    return  $ggg;
    // " $_SESSION[indeks]"; // mysqli_num_rows($sql);
}

function table_predmeti($sql2)
{
    $tr = "";
    if (!empty($sql2)) {
        if ($sql2 == "ispiti_od_studenta") {
            $query = "SELECT * FROM `student_predmet` WHERE `student_predmet`.`id_studenta` = $_SESSION[indeks]";
        }
        if ($sql2 == "prijavljeni") {
            $query = "SELECT * FROM `prijavljeni_ispiti` WHERE `prijavljeni_ispiti`.`indeks` =  $_SESSION[indeks]";
        }

        $sql = query($query);
        if (mysqli_num_rows($sql)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $sql_H = query("SELECT * FROM `predmeti` WHERE `predmeti`.`id_predmeta` = `$row[id_predmeta]`");

                if (mysqli_num_rows($sql_H)) {
                    while ($row_H = mysqli_fetch_assoc($sql_H)) {
                        $tr  .= "<tr>
             <th>$row_H[Ime_predmeta]</th>
             <th>" . Specific("datumIspita", "ispit", $row['id_predmeta']) . "</th>
             <th>$row_H[Profesor]</th>
             <th>" . Specific("K1", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("K2", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("ZakljucnaOcena", "ispit", $row['id_predmeta']) . "</th>
             <th>" . Specific("prijavljeni_ispiti", "brojPrijava", $row['id_predmeta']) . "</th>
 
             </tr>";
                    }
                }
            }
        }
    }
    return $tr;
}

function Lang($word)
{
    include "./lang/$_SESSION[lang].php";
    return $lang[$word];
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

function prijaviIspit($id)
{
    if (moneyH() > 500) {
        $sql = query("");
    } else {
        echo "Nedevoljan iznos(novac) na vašem računu!";
    }
}
