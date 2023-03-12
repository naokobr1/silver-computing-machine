<?php
include "../classes/counselor.php";
$csl_first_name = $_POST['csl_first_name']; 
$csl_last_name = $_POST['csl_last_name']; 
$csl_note = $_POST['csl_note'];


$counselor = new Counselor;

$counselor->createCounselor($csl_first_name , $csl_last_name, $csl_note);
$counselor->getAllCounselors();
$counselor->getCounselor($csl_id);
?>