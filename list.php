<?php
 if(isset($_GET["deleted"]))
 {
 	$deletemessage=$_GET["deleted"];
	echo "$deletemessage is deleted successfully";
 }
// class viewlist
// {
//    public function __construct()
//    {
//       include 'studentModel.php';
//    }
//    public function callstudentmodel($table)
//    {
//    	   $getstudentdata = new studentModel();
//    	   $listdata = $getstudentdata->selectdata($table);
//    	   return $listdata;
//    }

// }

include 'studentModel.php';
$table="student";
$getstudentdata = new studentModel();
$listdata = $getstudentdata->selectdata($table);
?>
<html>
<head><h1><center>VIEW STUDENT DETAILS</center></h1></head>
<body>
	<table border=1>
		<tr><td>NAME</td><td>AGE</td><td>GENDER</td><td>ADDRESS</td><td>ROLL NO</td></tr>
		<?php
		foreach($listdata as $data)
		{
        ?>
         <tr>
         	<td><?php echo $data["Name"];?></td>
         	<td><?php echo $data["age"];?></td>
         	<td><?php echo $data["gender"];?></td>
         	<td><?php echo $data["address"];?></td>
         	<td><?php echo $data["rollno"];?></td>
         	<!--<td><a href="studentController.php?singleid=<?php echo $data["id"];?>">SINGLE VIEW</a></td>-->
         </tr>


       <?php
		}
		?>
	</table>
	<a href="view.php">BACK</a>
</body>
</html>