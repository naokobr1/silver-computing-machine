<?php
session_start();
include "../classes/future-path.php";

$future_path = new FuturePath;

// $fp_cat_id = $_POST['fp_cat_id'];
// $industry_id = $_POST['industry_id'];
// $occupation_id = $_POST['occupation_id'];
// $student_id = $_SESSION['student_id'];
// if(isset($_POST['btn_cd_emp'])){
//     $company_name = $_POST['company'];
//     $pref_id = $_POST['prefecture'];
//     $app_cat_id = $_POST['apply'];
//     $cd_note = $_POST['cd_note'];
//     $higher_edu = $_POST['higher_edu'];
//     $future_path->createCareerDecisionEmp($fp_cat_id, $company_name, $pref_id, $industry_id, $occupation_id, $app_cat_id, $student_id, $cd_note);
//     $future_path->createCareerDecisionEdu($fp_cat_id, $heigher_edu, $student_id, $cd_note);
// }elseif(isset($_POST['btn_cd_edu'])) {
//     $fp_cat_id = $_POST['fp_cat_id'];
//     $higher_edu = $_POST['higher_edu'];
//     $cd_note = $_POST['cd_note'];
//     $future_path->createCareerDecisionEdu($fp_cat_id, $heigher_edu, $student_id, $cd_note);
// }else {
//     $fp_note = $_POST['fp_note']; 
// }

$fp_cat_id = $_POST['fp_cat_id'];
$student_id = $_SESSION['student_id'];
if(isset($_POST['btn_cd_edu'])){
    // $fp_cat_id = $_POST['fp_cat_id'];
    $higher_edu = $_POST['higher_edu'];
    $cd_note = $_POST['cd_note'];
    $future_path->createCareerDecisionEdu($fp_cat_id, $higher_edu, $student_id, $cd_note);
} elseif (isset($_POST['btn_cd_emp'])){
    $industry_id = $_POST['industry_id'];
    $occupation_id = $_POST['occupation_id'];
    $company_name = $_POST['company'];
    $pref_id = $_POST['prefecture'];
    $app_cat_id = $_POST['apply'];
    $cd_note = $_POST['cd_note'];
    $future_path->createCareerDecisionEmp($fp_cat_id, $company_name, $pref_id, $industry_id, $occupation_id, $app_cat_id, $student_id, $cd_note);
} else {
    $fp_note = $_POST['fp_note']; 
}


$future_path->getAllFpCat();
$future_path->getAllIndustries();
$future_path->getAllOccupations();

$future_path->getFpCat($fp_cat_id);
$future_path->getIndustry($industry_id);
$future_path->getOccupation($occupation_id);


$future_path->createFuturePath($fp_cat_id, $industry_id, $occupation_id, $student_id, $fp_note);
$future_path->getAllPrefectures();
$future_path->getAllAppCat();


?>

