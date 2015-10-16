<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DbManager();
    $id = $db->execute(
          "INSERT INTO residents (full_name, relationship_id, birth_date, birth_place, civil_status_id, years_of_residency, occupation, gender_id, highest_education_attainment_id, deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
        , array($_POST['full_name'], $_POST['relationship_id'], $_POST['birth_date'], $_POST['birth_place'], $_POST['civil_status_id'], $_POST['years_of_residency'], $_POST['occupation'], $_POST['gender_id'], $_POST['highest_education_attainment_id'], 0));
    $db->execute(
          "INSERT INTO owner_residents (owner_id, resident_id) VALUES (?, ?);"
        , array($_POST['pk_owner'], $id));
    echo $id;
}
