<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new DbManager();
    $residents = $db->execute("SELECT
              res.full_name
            , rel.name AS rel_name
            , gen.name AS gen_name
            , res.birth_date
            , res.birth_place
            , civ.name AS civ_name
            , res.years_of_residency
            , res.occupation
            , edu.name AS edu_name
        FROM residents res
        LEFT OUTER JOIN relationships rel
        ON rel.id = res.relationship_id
        LEFT OUTER JOIN genders gen
        ON gen.id = res.gender_id
        LEFT OUTER JOIN civil_statuses civ
        ON civ.id = res.civil_status
        LEFT OUTER JOIN educations edu
        ON edu.id = res.highest_education_attainment_id
        LEFT OUTER JOIN owner_residents ors
        ON ors.resident_id = res.id
        WHERE ors.owner_id = ? AND rel.genre = ?
        ORDER BY res.id ASC;
        ", array($_GET['pk_owner'], $_GET['genre']));
    $r = '<tr><th>Full Name</th><th>Relationship</th><th>Gender</th><th>Birth Date</th><th>Birth Place</th><th>Civil Status</th><th>Years of Residency</th><th>Occupation</th><th>Highest Education Attainment</th></tr>';
    foreach($residents as $k => $v) {
        $r = $r . '<tr>';
        foreach($v as $k2 => $v2) {
            $r = $r . '<td>' . $v2 . '&nbsp;</td>';
        }
        $r = $r . '</tr>';
    }
    echo $r;
    //echo json_encode($residents);
}
