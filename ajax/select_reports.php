<?php
require "../lib/db.php";
include_once '../lib/phpexcel/PHPExcel.php';
include_once '../lib/phpexcel/PHPExcel/IOFactory.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $method = $_POST['method'];
    unset($_POST['method']);

    $db = new DbManager();
    $sql1 = "SELECT
              res.full_name AS `Full Name`
            , own.house_number As `House Number`
            , own.address As `Address`
            , res.birth_date AS `Birth Date`
            , res.birth_place AS `Birth Place`
            , gen.name AS `Gender`
            , civ.name AS `Civil Status`
            , res.occupation AS `Occupation`
            , res.years_of_residency AS `Years of Residency`
        FROM owners res
        LEFT OUTER JOIN owners own
        ON own.id = res.id
        LEFT OUTER JOIN genders gen
        ON gen.id = res.gender_id
        LEFT OUTER JOIN civil_statuses civ
        ON civ.id = res.civil_status_id";
    $sql2 = "SELECT
              res.full_name AS `Full Name`
            , own.house_number As `House Number`
            , own.address As `Address`
            , res.birth_date AS `Birth Date`
            , res.birth_place AS `Birth Place`
            , gen.name AS `Gender`
            , civ.name AS `Civil Status`
            , res.occupation AS `Occupation`
            , res.years_of_residency AS `Years of Residency`
        FROM residents res
        LEFT OUTER JOIN owner_residents ors
        ON ors.resident_id = res.id
        LEFT OUTER JOIN owners own
        ON own.id = ors.owner_id
        LEFT OUTER JOIN genders gen
        ON gen.id = res.gender_id
        LEFT OUTER JOIN civil_statuses civ
        ON civ.id = res.civil_status_id";
    $where = " WHERE ";
    $first = true;
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
        } else if(strpos($k, 'House_Number') === 0) {
            $where = $where . 'own.house_number';
            $type = 'str';
        } else if(strpos($k, 'Address') === 0) {
            $where = $where . 'own.address';
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
        } else if ($v[0] === '1') {
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
    $residents = $db->execute($sql, array());
    $h = '<thead><tr>';
    if (count($residents) > 0) {
        foreach($residents[0] as $k => $v) {
            $h = $h . '<td>' . $k . '&nbsp;</td>';
        }
        $h = $h . '</tr></thead>';
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
    if ($method == '1') {
        echo $h;
        echo $r;
    } else if ($method == '2') {
        //var_dump($residents);
        $excel = new PHPExcel();
        $excel->setActiveSheetIndex(0);
        $sheet = $excel->getActiveSheet();
        $cnt = 0;
        foreach ($residents[0] as $k => $v) {
            $sheet->setCellValueByColumnAndRow($cnt, 1, $k);
            $cnt++;
        }
        $row_cnt = 2;
        foreach ($residents as $k => $v) {
            $col_cnt = 0;
            foreach ($v as $k => $v2) {
                $sheet->setCellValueByColumnAndRow($col_cnt, $row_cnt, $v2);
                $col_cnt++;
            }
            $row_cnt++;
        }
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $now = strval(time());
        $file_name = $now . '.xlsx';
        $writer->save(dirname(__FILE__) . '/../download/' . $file_name);
        $file_name = '../download/' . $file_name;
        echo $file_name;
    }
}
