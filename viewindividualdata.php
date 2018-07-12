<?php

   if(isset($_GET["singleid"]))
   	{
         $individualid=$_GET["singleid"];

      }
  
include 'studentModel.php';

$table="student";

$indid = new studentModel();

$individualdata = $indid->singledata($table,$individualid);

?>
<html>
<head><h1><center>VIEW AND EDIT STUDENT DETAILS</center></h1></head>
<body>
   <table border=1>
      <tr><td>NAME</td><td>AGE</td><td>GENDER</td><td>ADDRESS</td><td>ROLL NO</td><td>ACTION</td></tr>
      <?php
      foreach($individualdata as $data)
      {
        ?>
         <tr>
            <td><?php echo $data["Name"];?></td>
            <td><?php echo $data["age"];?></td>
            <td><?php echo $data["gender"];?></td>
            <td><?php echo $data["address"];?></td>
            <td><?php echo $data["rollno"];?></td>
            <td><a href="studentController.php?indsingleid=<?php echo $data["id"];?>">DELETE PROFILE</a></td>
             <td><a href="editprofile.php?editsingleid=<?php echo $data["id"];?>">EDIT PROFILE</a></td>
         </tr>


       <?php
      }
      ?>

   </table>
   <a href="view.php">BACK</a>
   </body>
   </html>
