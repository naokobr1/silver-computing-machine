<?php

include_once "../classes/account.php";

$student_id = $_POST['student_id'];
$password = $_POST['password'];


$account = new Account;

$account->login($student_id, $password);

?>