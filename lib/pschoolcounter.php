<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('db.php');

$pschoolcounter = mysqli_query($db, "SELECT id FROM tbl_springpschool2022");
$pschoolcounter = mysqli_num_rows($pschoolcounter);