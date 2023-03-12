<?php

require "database.php";
//class ChildClass extends ParentClass { ... }
class News extends Database{

    // public function getFiveNews(){
    //     $sql = "SELECT * FROM news ORDER BY date_posted DESC LIMIT 5";

    //     if($result = $this->conn->query($sql)){
    //         if($result->num_rows > 0);
    //         return $result->fetch_assoc();

    //     } else {
    //         die("Error");
    //     }
    // }

    function getAllCategories() {
        $sql = "SELECT * FROM categories";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getCategory($category_id){
        $sql = "SELECT `category_id`, `category_name` FROM categories WHERE category_id = '$category_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                // $csl="";
                // while($row=$result->fetch_assoc()){
                    // $csl = $row['csl_last_name']. "".$row['csl_first_name'];
                }
                // return $csl;
                return $result->fetch_assoc();
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
    }

    public function createNews($news_title, $category_id, $description, $file_name, $flyer_tmp){
        $sql = "INSERT INTO `news`(`news_title`, `category_id`, `description`, `flyer`) VALUES ('$news_title', '$category_id', '$description', '$file_name')";
        // Upload flyer pdf file.
        // basename() パスの最後にある名前の部分を返す
        $flyer_file_path = '../assets/uploads_pdf/'. basename($file_name);
        //move_uploaded_file(string $from, string $to)
       if( move_uploaded_file($flyer_tmp, $flyer_file_path))
        {
            if($this->conn->query($sql)){
                header("location: ../views/add-news.php");
                exit;
            } else {
                die("Error");
            }
        }else{
            die('Error Moving file');
        }
      
        // INSERT INTO `news`(`news_title`, `category_id`, `description`, `flyer`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]');

       
    }

    public function getAllNews() {
        $sql = "SELECT N.*, C.category_id, C.category_name FROM news AS N INNER JOIN categories AS C ON N.category_id = C.category_id ORDER BY date_posted DESC";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function getNews($news_id){
        $sql = "SELECT N.*, C.category_id, C.category_name FROM news AS N INNER JOIN categories AS C 
                ON N.category_id = C.category_id WHERE news_id = '$news_id'";
        if($result = $this->conn->query($sql)){
            if($result->num_rows ==1){
                return $result->fetch_assoc();
                }
                
            }else{
                die("something went wrong with your SQL query".$this->conn->error);
            }
    }

    function getFiveNews(){
        $sql = "SELECT N.*, C.category_id, C.category_name FROM news AS N INNER JOIN categories AS C 
                ON N.category_id = C.category_id ORDER BY date_posted DESC LIMIT 5";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }
    }

    function Pagenation(){
        $news = new News;
        $news_list = $news->getAllNews();
        $results_per_page = 5;  
        $number_of_result = $news_list->num_rows;
        //$number_of_page = ceil ($number_of_result / $results_per_page);  
        if (!isset ($_GET['page']) ) {  
            $page = 1;  
        } else {  
            $page = $_GET['page'];  
        }
        $page_first_result = ($page-1) * $results_per_page;
        
        $sql = "SELECT N.*, C.category_id, C.category_name FROM news AS N INNER JOIN categories AS C 
        ON N.category_id = C.category_id ORDER BY date_posted DESC LIMIT $page_first_result, $results_per_page";  
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("something went wrong with your SQL query".$this->conn->error);
        }

    }
    


    
}
?>