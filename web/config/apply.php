<?php
    ob_start();

    include('functions.php');

    date_default_timezone_set('Asia/Jakarta');

    $obj = new Functions();

    $conn = $obj->db_connect();

    $db_select = $obj->db_select($conn);

?>