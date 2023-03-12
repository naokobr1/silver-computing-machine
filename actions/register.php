<?php
include "../classes/account.php";
$student_id = $_POST['student_id']; 
$first_name = $_POST['first_name']; 
$last_name = $_POST['last_name'];
$contact_no = $_POST['contact_no'];
$email = $_POST['email'];
$password = $_POST['password'];
// $photo = '../assets/images/profile.png';

$account = new Account;

$account->createAccount($student_id, $first_name, $last_name, $contact_no, $email, $password)
?>