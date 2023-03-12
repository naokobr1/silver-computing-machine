<?php

require "database.php";
//class ChildClass extends ParentClass { ... }
class Counselor extends Database{

    public function createCounselor($csl_first_name, $csl_last_name, $csl_note){
        $sql = "INSERT INTO `counselors`(`csl_first_name`, `csl_last_name`, `csl_note`) VALUE ('$csl_first_name', '$csl_last_name', '$csl_note')";

        if($this->conn->query($sql)){
            header("location: ../views/add-counselor.php");
            exit;
        } else {
            die("Error");
        }
    }

    function getAllCounselors() {
        $sql = "SELECT `csl_id`, `csl_first_name`, `csl_last_name`, `csl_note` FROM counselors";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getCounselor($csl_id){
        $sql = "SELECT `csl_id`, `csl_first_name`, `csl_last_name` FROM counselors WHERE csl_id = '$csl_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                return $result->fetch_assoc();
                }
                
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
        }
    

    
}
?>