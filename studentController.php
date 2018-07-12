<?php
class studentController
{
    
   public function __construct()
   {
   		//include 'view.php';
      include 'studentModel.php';
   }

   public function validateForm()
   {
      if(isset($_POST["submit_data"]))
		  {
        
        $error=array();
        $data=array();
     
      // checking name
      if(strlen(trim(htmlentities($_POST["name"]))) == 0)
      {
        $error['name'] = "please enter your name";
      }
      else
      {
        if(is_numeric(trim(htmlentities($_POST["name"]))))
        {
              $error["name"]="only Characters allowed";
        }
         else
         {
           $data['name'] = trim(htmlentities($_POST["name"]));
         }
         
      }

      // checking age
      if(strlen(trim(htmlentities($_POST["age"]))) == 0)
      {
        $error['age'] = "please enter your age";
      }
      else
      {
        if(is_numeric(trim(htmlentities($_POST["age"]))))
        {
             
             $data['age'] = trim(htmlentities($_POST["age"]));
        }
         else
         {
              $error["age"]="only numbers allowed";
         }
         
      }


      // checking address
      if(strlen(trim(htmlentities($_POST["address"]))) == 0)
      {
        $error['address'] = "please enter your address";
      }
      else
      {
        $data['address'] = trim(htmlentities($_POST["address"]));
      }
      

      //checking rollno
      if(strlen(trim(htmlentities($_POST["rollno"]))) == 0)
      {
        $error['rollno'] = "please enter your Rollno";
      }
      else
      {
        if(is_numeric(trim(htmlentities($_POST["rollno"]))))
        {
             
             $data['rollno'] = trim(htmlentities($_POST["rollno"]));
        }
         else
         {
              $error["rollno"]="only numbers allowed";
         }
         
      }

      //Please enter your sex
      if(!empty($_POST["gender"]))
      {
        $data['gender'] = trim(htmlentities($_POST["gender"]));
      }
      else
      {
        $error['sex'] = "please enter Your Gender";
      }
      //

      

      

      if(count($error) > 0)
      {
        foreach($error as $key => $value)
        {
          echo $key . "-" . $value . "<br>";
        }
      }

      else
      {  
        $insert = new studentModel();
        $table = "student";
        $result=$insert->insertdata($table,$data);
        if($result)
        {
          header("location:singleview.php");
        }
        
        // if($mu=="1")
        // {
          
        //   echo "inserted successfully";
       
        // }

        // else
        // {
        // echo "error";
        // }
      }//else
		} //validate form ends

    //delete submit 
    if(isset($_POST["delsubmit"]))
    {
      $studentid = $_POST["deletestudentid"];
      $delete = new studentModel();
      $table = "student";
      $deleteresult=$delete->deletedata($table,$studentid);
      if($deleteresult)
      {
        header("location:singleview.php");
      }
    }
    //single view
    if(isset($_GET["singleid"]))
    {
      $singleid = $_GET["singleid"];
      $singlefetch = new studentModel();
      $table = "student";
      $resultsingledata = $singlefetch->singledata($table,$singleid);

      if($resultsingledata)
      {
         header("location:viewindividualdata.php");
      }
    }

    //delete individual
    if(isset($_GET["indsingleid"]))
    {


       $singleid = $_GET["indsingleid"];
       
       $singlefetch = new studentModel();
       $table = "student";
       $resultsingledata = $singlefetch->deletedata($table,$singleid);
       if($resultsingledata)
       {
          header("location:singleview.php");
       }
    }
    //update individual
    if(isset($_GET["editsingleid"]))
    {


       $editsingleid = $_GET["editsingleid"];
       echo $editsingleid;
       
       if($editsingleid)
       {
          header("location:editprofile.php?id=editid");
       }
    }

    //update
    if(isset($_POST["updatedata"]))
    {
         $errors=array();
         $datas=array();

       // $updateid = $_POST["updateid"];
       // $name = $_POST["name"];
       // $age = $_POST["age"];
       // $gender = $_POST["gender"];
       // $address = $_POST["address"];
       // $rollno = $_POST["rollno"];
       // $updatearray = array("Name"=>$name,"age"=>$age,"gender"=>$gender,"address"=>$address,"rollno"=>$rollno);

       // echo $updateid;
       // $update = new studentModel();
       // $table = "student";
       // $result = $update->updatedata($table,$updateid,$updatearray);
       // if($result)
       //  {
       //    header("location:singleview.php");
       //  }
         //name validation
       if(strlen(trim(htmlentities($_POST["name"]))) == 0)
      {
        $errors['name'] = "please enter your name";
      }
      else
      {
        if(is_numeric(trim(htmlentities($_POST["name"]))))
        {
              $error["name"]="only Characters allowed";
        }
         else
         {
           $datas['name'] = trim(htmlentities($_POST["name"]));
         }
         
      }
      //name validation ends
      // checking age
      if(strlen(trim(htmlentities($_POST["age"]))) == 0)
      {
        $errors['age'] = "please enter your age";
      }
      else
      {
        if(is_numeric(trim(htmlentities($_POST["age"]))))
        {
             
             $datas['age'] = trim(htmlentities($_POST["age"]));
        }
         else
         {
              $errors["age"]="only numbers allowed";
         }
         
      }
      //checking age ends
      //checking address
      if(strlen(trim(htmlentities($_POST["address"]))) == 0)
      {
        $error['address'] = "please enter your address";
      }
      else
      {
        $datas['address'] = trim(htmlentities($_POST["address"]));
      }
      // checking address ends
      //checking rollno
      if(strlen(trim(htmlentities($_POST["rollno"]))) == 0)
      {
        $errors['rollno'] = "please enter your Rollno";
      }
      else
      {
        if(is_numeric(trim(htmlentities($_POST["rollno"]))))
        {
             
             $datas['rollno'] = trim(htmlentities($_POST["rollno"]));
        }
         else
         {
              $errors["rollno"]="only numbers allowed";
         }
         
      }
      //checking rollno ends
      //checking gender
      
      // if(empty($_POST["gender"]))
      // {
      //   $errors['gender'] = "please enter Your Gender";
        
      // }
      // else
      // {
      //   $datas['gender'] = trim(htmlentities($_POST["gender"]));
      // }
      //checking gender ends
      // checking address
      if(strlen(trim(htmlentities($_POST["address"]))) == 0)
      {
        $errors['address'] = "please enter your address";
      }
      else
      {
        $datas['address'] = trim(htmlentities($_POST["address"]));
      }
      //checking address ends
      //error checking
      if(count($errors) > 0)
      {
        foreach($errors as $key => $value)
        {
          echo $key . "-" . $value . "<br>";
        }
      }
      
    
      
      

      else
      {  
         $updateid = trim(htmlentities($_POST["updateid"]));
         echo $updateid;
         $updatestudent = new studentModel();
         $table = "student";
         $result = $updatestudent->updatedata($table,$datas,$updateid);
         if($result)
         {
           header("location:singleview.php");
         }
      }//else
        // if($mu=="1")
        // {
          
        //   echo "inserted successfully";
       
        // }

        // else
        // {
        // echo "error";
        // }
      
       
    


   }//update if ends
    
   }//function ends
   
          
   
}//class ends

// $student = new studentController();
//$student->manipulateData();

$student=new studentController();
$student->validateForm();




?>