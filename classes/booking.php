<?php

require "database.php";
//class ChildClass extends ParentClass { ... }
class Booking extends Database{

    public function createBooking($bk_date, $bk_time, $csl_id, $student_id, $bk_note){
        session_start();
        $sql = "INSERT INTO `booking`(`bk_date`, `bk_time`, `csl_id`, `student_id`, `bk_note`) VALUE ('$bk_date', '$bk_time', '$csl_id', '$student_id', '$bk_note')";

        if($this->conn->query($sql)){
            header("location: ../views/complete-bk.php");
            exit;
        } else {
            die("Error");
        }
    }


    public function  checkDuplicateBooking($bk_date, $bk_time, $csl_id){
        $sql="SELECT DISTINCT * FROM booking b, counselors c WHERE
        b.bk_date ='$bk_date' AND
        b.bk_time = '$bk_time' AND
        b.csl_id = '$csl_id' AND
        b.csl_id = c.csl_id";

        
        if($result = $this->conn->query($sql)){
            if($result->num_rows > 0){
                return 'Yes';
            } else {
                return 'No';
            }
        }else {
            die("Error");
        }
    }

    public function getAllBookings(){
        $date = date("Y-m-d");
        // $time = date("h:i");
        $sql = "SELECT B.*, A.student_id, A.first_name, A.last_name, C.csl_first_name, C.csl_last_name FROM booking AS B INNER JOIN accounts AS A ON B.student_id = A.student_id 
        INNER JOIN counselors AS C ON B.csl_id = C.csl_id WHERE B.bk_date >= '$date'
        ORDER BY bk_date ASC";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }
     

}
?>