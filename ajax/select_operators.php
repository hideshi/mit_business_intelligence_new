<?php
require "../lib/db.php";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $db = new DbManager();
    $operators = $db->execute("SELECT
          opr.id AS id
        , opr.name AS name
        FROM options opt
        INNER JOIN operators opr
        ON opr.genre = opt.genre OR opr.genre = 1
        WHERE opt.id = ?
        ORDER BY opr.id ASC;
        ", array($_GET['option_id']));
    $r = '';
    foreach($operators as $k => $v) {
            $r = $r . '<option value="' . $v['id'] . '">' . $v['name'] . '&nbsp;</option>';
    }
    echo $r;
}
