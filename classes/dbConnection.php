<?php 


class DB{

    var $Host       = "localhost";
    var $DBUser     = "root";
    var $DBPassword = "";
    var $DBName     = "group11"; 
    var $con        = null;
    

    public   function __construct()
       {
        
        $this->con =  mysqli_connect($this->Host,$this->DBUser,$this->DBPassword,$this->DBName);
              
       if(!$this->con){

         die ('Error : '. mysqli_connect_error());    
          }
       }


       function doQuery($sql){

        $op = mysqli_query($this->con,$sql); 

        if($op){
            $status = true;
        }else{
            $status = false;
        }

        return $status;

       }



       function doQuerySelect($sql){

        $result = mysqli_query($this->con,$sql); 
        
        $data = [];

        while($raw = mysqli_fetch_assoc($result)){
             $data[] = $raw;
        }



        return $data;

       }



       function __destruct()
       {
           mysqli_close($this->con);
       }


}
