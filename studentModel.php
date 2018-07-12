<?php
class studentModel
{
   private $host="localhost";
   private $user="root";
   private $pass="";
   public $db="college";

  public function connect()
  {
    $con = mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
    return $con;
  }
  
  public function insertdata($table,$data)
  {
    
           $string = "INSERT INTO ".$table." (";            
           $string .= implode(",", array_keys($data)) . ') VALUES (';            
           $string .= "'" . implode("','", array_values($data)) . "')";  

           if(mysqli_query($this->connect(), $string))  
           {  
                return $this->selectdata($table);
           }  
           else  
           {  
                echo mysqli_error($this->con);  
           }   
    
  }

  public function deletedata($table,$studentid)
  {
         

       $deletequery = "DELETE FROM $table WHERE id ='$studentid'";

       $result = mysqli_query($this->connect(), $deletequery);

       return $result;
  }

  public function updatedata($table,$data,$updateid)
  {
    
    foreach($data as $key=>$val) {
        $cols[] = "$key = '$val'";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE id=".$updateid;

    $updateresult = mysqli_query($this->connect(), $sql);

    return $updateresult;

  }

  public function selectdata($table,$limit,$linkno)
  {

           $array = array();  

           $query = "SELECT * FROM ".$table.""; 

           $result = mysqli_query($this->connect(), $query);

           $rowcount = "SELECT * FROM ".$table.""; 

           $countresult = mysqli_query($this->connect(), $rowcount);

           $count=mysqli_num_rows($countresult);

           echo $count."<br>";

           $pageoffset = $count/$limit;

           $pageoffset = ceil($pageoffset);

           echo $pageoffset;

           

           while($row = mysqli_fetch_assoc($result))  
           {  
                $array[] = $row;  
           } 
           $array["offset"]=$pageoffset;
           return $array; 
  }

  public function singledata($table,$singleid)
  {
          $singledata = "select * from $table where id = '$singleid'";

          $result = mysqli_query($this->connect(), $singledata);

          while($row = mysqli_fetch_assoc($result))  
           {  
                $arrays[] = $row;  
           }  

           
           return $arrays;
  }

  public function editsingledata($table,$singleid)
  {
          $singledata = "select * from $table where id = '$singleid'";

          $editresult = mysqli_query($this->connect(), $singledata);

          while($row = mysqli_fetch_assoc($editresult))  
           {  
                $arrays[] = $row;  
           } 

           return $arrays;
  }

}


?>