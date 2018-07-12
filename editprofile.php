<?php

   if(isset($_GET["editsingleid"]))
    {
         $editid = $_GET["editsingleid"];
         
    }

 include 'studentModel.php';
 
 $table = "student";
 $getstudentdata = new studentModel();
 $listdata = $getstudentdata->editsingledata($table,$editid);
 $updateid = $listdata[0]["id"];
 $name = $listdata[0]["Name"];
 $age = $listdata[0]["age"];
 $gender = $listdata[0]["gender"];
 $address = $listdata[0]["address"];
 $rollno = $listdata[0]["rollno"];
 
 

?>
<html>

<head>
    <h1><center>EDIT STUDENT DETAILS</center></h1></head>

<body>
    
    <form name="f1" method="post" action="studentController.php">
        <div>NAME:
            <input type="text" name="name" value="<?php if(isset($name)){echo $name;}?>">
        </div>
        <div>AGE:
            <input type="text" name="age" value="<?php if(isset($age)){echo $age;}?>">
        </div>
        <div>GENDER:
            <input type="radio" name="gender" value="<?php if($gender=="male")?>" checked>male
            <input type="radio" name="gender" value="<?php if($gender=="female")?>" checked">female
        </div>
        <div>ADDRESS:
            <textarea rows="4" cols="30" name="address" ><?php if(isset($address)){echo $address;}?></textarea>
        </div>
        <div>ROLL NO:
            <input type="text" name="rollno" maxlength="10" value="<?php if(isset($rollno)){echo $rollno;}?>">
        </div>
        <div>
            <input type="hidden" name="updateid" value="<?php echo $updateid;?>">
            <input type="submit" value="update" name="updatedata">
        </div>
    </form>

</html>