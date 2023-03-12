<?php

require "database.php";
//class ChildClass extends ParentClass { ... }
class Account extends Database{

    public function createAccount($student_id, $first_name, $last_name, $contact_no, $email, $password){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `accounts`(`student_id`, `first_name`, `last_name`, `contact_no`, `email`, `password`) VALUE ('$student_id', '$first_name', '$last_name', '$contact_no', '$email', '$password')";

        if($this->conn->query($sql)){
            header("location: ../views/login.php");
            exit;
        } else {
            die("Error");
        }
    }

    function login($student_id, $password){
        $sql = "SELECT * FROM accounts WHERE student_id = '$student_id'";

        if($result = $this->conn->query($sql)){
            // $result->num_rows//結果セットの行数を取得する
            if($result->num_rows ==1){
                // check and compare the password from the UI to the DATABSDE
                $account_details = $result->fetch_assoc();
                // store all information from the data in an array $account_details
                if(password_verify($password, $account_details['password'])){
                    session_start();
                    $_SESSION['account_id'] = $account_details['account_id'];
                    $_SESSION['student_id'] = $account_details['student_id'];

                    if($account_details['role']=='A'){
                        header("location: ../views/icss-admin-menu.php");
                    }elseif($account_details['role']=='U'){
                        header("location:../views/icss-user-menu.php");
                    }

                    exit;
                }else{
                    die("Password is incorrect ".$this->conn->error);
                }
            }else{
                die("Student ID not found".$this->conn->error);
            }
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }
}
?>