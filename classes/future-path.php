<?php

require "database.php";
//class ChildClass extends ParentClass { ... }
class FuturePath extends Database{

    function getAllFpCat() {
        $sql = "SELECT * FROM future_path_categories";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }    

    function getAllIndustries() {
        $sql = "SELECT * FROM industries";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getAllOccupations() {
        $sql = "SELECT * FROM occupations";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getFpCat($fp_cat_id){
        $sql = "SELECT `fp_cat_id`, `fp_cat_name` FROM future_path_categories WHERE fp_cat_id = '$fp_cat_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                }
                return $result->fetch_assoc();
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
        }

    function getIndustry($industry_id){
        $sql = "SELECT `industry_id`, `industry_name` FROM industries WHERE industry_id = '$industry_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                }
                return $result->fetch_assoc();
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
        }

    function getOccupation($occ_id){
        $sql = "SELECT `occupation_id`, `occupation_name` FROM occupations WHERE occupation_id = '$occ_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                }
                return $result->fetch_assoc();
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
        }

    public function createFuturePath($fp_cat_id, $industry_id, $occupation_id, $student_id, $fp_note){
        $sql = "INSERT INTO `future_path`(`fp_cat_id`, `industry_id`, `occupation_id`, `student_id`, `fp_note`) VALUE ('$fp_cat_id', '$industry_id', '$occupation_id', '$student_id', '$fp_note')";

        if($this->conn->query($sql)){
            header("location: ../views/complete-fp.php");
            exit;
        } else {
            die("Error");
        }
    }

    function getAllPrefectures() {
        $sql = "SELECT * FROM prefectures";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getAllAppCat() {
        $sql = "SELECT * FROM apply_categories";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getPrefecture($pref_id){
        $sql = "SELECT `pref_id`, `pref_name` FROM prefectures WHERE pref_id = '$pref_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                }
                return $result->fetch_assoc();
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
        }

    function getAppCat($app_cat_id){
        $sql = "SELECT `app_cat_id`, `app_cat_name` FROM apply_categories WHERE app_cat_id = '$app_cat_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                }
                return $result->fetch_assoc();
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
        }
     
        public function createCareerDecisionEmp($fp_cat_id, $company_name, $pref_id, $industry_id, $occupation_id, $app_cat_id, $student_id, $cd_note){
            $sql = "INSERT INTO `career_desicion`(`fp_cat_id`, `company_name`, `pref_id`, `industry_id`, `occupation_id`, `app_cat_id`, `student_id`, `cd_note`) VALUE ($fp_cat_id, '$company_name', $pref_id, $industry_id, $occupation_id, $app_cat_id, '$student_id', '$cd_note')";
    
            if($this->conn->query($sql)){
                header("location: ../views/complete-cd.php");
                exit;
            } else {
                die("Error");
            }
        }

        public function createCareerDecisionEdu($fp_cat_id, $higher_edu, $student_id, $cd_note){
            $sql = "INSERT INTO `career_desicion`(`fp_cat_id`, `higher_edu_name`, `student_id`, `cd_note`) VALUE ($fp_cat_id, '$higher_edu', '$student_id', '$cd_note')";
    
            if($this->conn->query($sql)){
                header("location: ../views/complete-cd.php");
                exit;
            } else {
                die("Error");
            }
        }

}
?>