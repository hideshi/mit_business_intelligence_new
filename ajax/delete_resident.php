<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DbManager();
    $db->execute("DELETE FROM residents WHERE id = ?;", array($_POST['id']));
    $db->execute("DELETE FROM owner_residents WHERE resident_id = ?;", array($_POST['id']));
}
