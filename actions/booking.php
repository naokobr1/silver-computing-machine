<?php
session_start();
include "../classes/booking.php";
// include "../classes/checkbooking.php";
$bk_date = $_POST['bk_date'];
$bk_time = $_POST['bk_time'];
$csl_id = $_POST['csl_id'];
$bk_note = $_POST['bk_note'];
$student_id = $_SESSION['student_id'];

$book = new Booking;

// $book->createBooking($bk_date, $bk_time, $csl_id, $student_id, $bk_note);
// $book->checkDuplicateBooking($bk_date, $bk_time, $csl_id);

$result = $book->checkDuplicateBooking($bk_date, $bk_time, $csl_id);
if($result == "Yes") {
    header("location: ../views/duplicated-bk.php");
} else if($result == "No") {
    $book->createBooking($bk_date, $bk_time, $csl_id, $student_id, $bk_note);
}
?>

