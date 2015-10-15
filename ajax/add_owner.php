<?php
require $_SERVER['DOCUMENT_ROOT'] . "/lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DbManager();
    if (empty($_POST['pk_owner'])) {
        $id = $db->execute(
              "INSERT INTO owners (house_number, type_of_ownership_id, full_name, address, birth_date, birth_place, citizenship, religion, highest_education_attainment_id, years_of_residency, civil_status_id, occupation, gender_id, deleted) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
            , array($_POST['house_number'], $_POST['type_of_ownership_id'], $_POST['full_name'], $_POST['address'], $_POST['birth_date'], $_POST['birth_place'], $_POST['citizenship'], $_POST['religion'], $_POST['highest_education_attainment_id'], $_POST['years_of_residency'], $_POST['civil_status_id'], $_POST['occupation'], $_POST['gender_id'], 0));
        echo $id;
    } else {
        $id = $db->execute(
              "UPDATE owners SET house_number = ?, type_of_ownership_id = ?, full_name = ?, address = ?, birth_date = ?, birth_place = ?, citizenship = ?, religion = ?, highest_education_attainment_id = ?, years_of_residency = ?, civil_status_id = ?, occupation = ?, gender_id = ? WHERE id = ?;"
            , array($_POST['house_number'], $_POST['type_of_ownership_id'], $_POST['full_name'], $_POST['address'], $_POST['birth_date'], $_POST['birth_place'], $_POST['citizenship'], $_POST['religion'], $_POST['highest_education_attainment_id'], $_POST['years_of_residency'], $_POST['civil_status_id'], $_POST['occupation'], $_POST['gender_id'], $_POST['pk_owner']));
        echo $id;
    }
}
