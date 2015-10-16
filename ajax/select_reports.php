<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DbManager();
    $sql1 = "SELECT
              res.full_name AS `Full Name`
            , res.birth_date AS `Birth Date`
            , res.birth_place AS `Birth Place`
            , gen.name AS `Gender`
            , civ.name AS `Civil Status`
            , res.occupation AS `Occupation`
            , res.years_of_residency AS `Years of Residency`
        FROM owners res
        LEFT OUTER JOIN genders gen
        ON gen.id = res.gender_id
        LEFT OUTER JOIN civil_statuses civ
        ON civ.id = res.civil_status_id";
    $sql2 = "SELECT
              res.full_name
            , res.birth_date
            , res.birth_place
            , gen.name AS gen_name
            , civ.name AS civ_name
            , res.occupation
            , res.years_of_residency
        FROM residents res
        LEFT OUTER JOIN genders gen
        ON gen.id = res.gender_id
        LEFT OUTER JOIN civil_statuses civ
        ON civ.id = res.civil_status_id";
    $where = " WHERE ";
    $first = true;
    //var_dump($_POST);
    $keys = array();
    foreach($_POST as $k => $v) {
        if (!$first) {
            $where = $where . ' AND ';
        }
        $v = explode(',', $v);
        $type = '';
        $keys[] = $k;
        if (strpos($k, 'Full_Name') === 0) {
            $where = $where . 'res.full_name';
            $type = 'str';
        } else if(strpos($k, 'Birth_Date') === 0) {
            $where = $where . 'res.birth_date';
            $type = 'str';
        } else if(strpos($k, 'Birth_Place') === 0) {
            $where = $where . 'res.birth_place';
            $type = 'str';
        } else if(strpos($k, 'Gender') === 0) {
            $where = $where . 'gen.name';
            $type = 'str';
        } else if(strpos($k, 'Civil_Status') === 0) {
            $where = $where . 'civ.name';
            $type = 'str';
        } else if(strpos($k, 'Occupation') === 0) {
            $where = $where . 'res.occupation';
            $type = 'str';
        } else if(strpos($k, 'Years_of_Residency') === 0) {
            $where = $where . 'res.years_of_residency';
            $type = 'int';
        }
        if ($v[0] === '1' && $type === 'str') {
            $where = $where . ' LIKE ';
        } else if ($v[0] === '1' && $type === 'int') {
            $where = $where . ' = ';
        } else if($v[0] === '2') {
            $where = $where . ' > ';
        } else if($v[0] === '3') {
            $where = $where . ' < ';
        }
        if ($type === 'str' && strpos($k, 'Gender') !== 0) {
            $where = $where . " '%" . $v[1] . "%' ";
        } else if ($type === 'str' && strpos($k, 'Gender') === 0) {
            $where = $where . " '" . $v[1] . "' ";
        } else if ($type === 'int') {
            $where = $where . " " . $v[1] . " ";
        }
        if ($first) {
            $first = false;
        }
    }
    $sql =  $sql1 . $where . ' UNION ' . $sql2 . $where;
    //echo $sql;
    //var_dump($keys);
    $residents = $db->execute($sql, array());
    //var_dump($residents);
    $h = '<thead><tr>';
    if (count($residents) > 0) {
        foreach($residents[0] as $k => $v) {
            $h = $h . '<td>' . $k . '&nbsp;</td>';
        }
        $h = $h . '</tr></thead>';
        echo $h;
    }
    $r = '<tbody>';
    foreach($residents as $k => $v) {
        $r = $r . '<tr>';
        foreach($v as $k2 => $v2) {
            $r = $r . '<td>' . $v2 . '&nbsp;</td>';
        }
        $r = $r . '</tr>';
    }
    $r = $r . '</tbody>';
    echo $r;
}
