<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new DbManager();
    $residents = $db->execute("SELECT
              own.house_number
            , gen.name AS gender
            , res.full_name
            , own.address
            , res.birth_date
            , res.birth_place
            , res.citizenship
            , res.religion
            , edu.name AS education
            , res.years_of_residency
            , civ.name AS civil_status
            , res.occupation
            , sts.name AS status
        FROM residents res
        LEFT OUTER JOIN relationships rel
        ON rel.id = res.relationship_id
        LEFT OUTER JOIN genders gen
        ON gen.id = res.gender_id
        LEFT OUTER JOIN civil_statuses civ
        ON civ.id = res.civil_status_id
        LEFT OUTER JOIN statuses sts
        ON sts.id = res.status_id
        LEFT OUTER JOIN educations edu
        ON edu.id = res.highest_education_attainment_id
        LEFT OUTER JOIN owner_residents ors
        ON ors.resident_id = res.id
        LEFT OUTER JOIN owners own
        ON own.id = ors.owner_id
        WHERE ors.resident_id = ?
        ORDER BY res.id ASC;
        ", array($_GET['resident_id']));
    $r = '{';
    foreach($residents as $k => $v) {
        foreach($v as $k2 => $v2) {
            $r = $r . '"' . $k2 . '":"' . $v2 . '",';
        }
    }
    $r = preg_replace("/,$/", "", $r);
    $r = $r . '}';
    echo $r;
}
