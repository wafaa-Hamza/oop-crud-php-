<?php 
session_start();

require 'validator.php';
require 'dbConnection.php';


class student{


    private $title;
    private $content;
    private $image; 
    private $result = null;
    public $con;
	
	
    public function register($data){

     # Create Validator Obj .... 
     $validator = new Validator;

     $this->title     = $validator->Clean($data['title']); 
     $this->content   = $validator->Clean($data['content']);
     $this->image     = $validator->Clean($data['image']);   

     # Validate Inputs .... 
     $errors = [];

     # Validate Title ..... 
     if(!$validator->validate($this->title,1)){
        $errors['title'] = "Field Required";
     }elseif(!$validator->validate($this->title,8)){
        $errors['title'] = "Invalid String";
     }

     # Validate Content ..... 
     if(!$validator->validate($this->content,1)){
        $errors['content'] = "Field Required";
     }elseif(!$validator->validate($this->content,2)){
        $errors['content'] = "Invalid Content";
     }

     # Validate image ... 
    if (!validate($_FILES['image']['name'], 1)) {
        $errors['Image']  = "Image Required";
    } elseif (!validate($_FILES['image']['name'], 5)) {
        $errors['Image']  = "Image : Invalid Extension";
    }


     #  Check Errors ... 
     if(count($errors) > 0 ){

        $this->result = $errors;
    }else{
       // db OP 
	   
       $dbObj = new DB;
	   
        $image = uploadFile($_FILES);

        if (empty($image) ) {
            $_SESSION['Message'] = ["Error In Uploading File Try Again"];
			
        } else {

       $sql = "insert into students (title,content,image) values ('$this->title','$this->content','$this->image')";
      
       $op = $dbObj->doQuery($sql); 
        
       if($op){
           $this->result = ["Success" => "data Inserted"];
       }else{
        $this->result = ["Error" => "Error Try Again"];
       }
    

        return $this->result;
}
	}
	}

 public function showData(){

      # Create Db Obj .... 
      $dbObj = new DB;

      $sql = "select * from students"; 

      $result = $dbObj->doQuerySelect($sql);

      return $result;

    }


 public function remove($id){

      # Create Db Obj .... 
      $dbObj = new DB;

      $sql = "delete from students where id = $id"; 

      $this->result = $dbObj->doQuery($sql); 
        
        return $this->result; 

    }

    public function edit($id,$title,$content,$image){ 
	global $db;
	
$sql = "UPDATE `students` SET `title`='[v$title]',`content`='[vcontent]',`image`='[image]' WHERE id= $id";

$this->result = $dbObj->doQuery($sql); 
        
        return $this->result; 

    }
}

?>