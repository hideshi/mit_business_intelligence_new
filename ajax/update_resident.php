<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DbManager();
    $db->execute("UPDATE residents SET
        full_name = ?
        , birth_date = ?
        , birth_place = ?
        , years_of_residency = ?
        , occupation = ?
        , citizenship = ?
        , religion = ?
        , relationship_id = ?
        , highest_education_attainment_id = ?
        , civil_status_id = ?
        , gender_id = ?
        , status_id = ?
        WHERE id = ?;
    ", array(
      $_POST['full_name']
    , $_POST['birth_date']
    , $_POST['birth_place']
    , $_POST['years_of_residency']
    , $_POST['occupation']
    , $_POST['citizenship']
    , $_POST['religion']
    , $_POST['relationship_id']
    , $_POST['highest_education_attainment_id']
    , $_POST['civil_status_id']
    , $_POST['gender_id']
    , $_POST['status_id']
    , $_POST['resident_id']
    ));
}
