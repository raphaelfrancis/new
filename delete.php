<?php
class getstudentid
{
   public function __construct()
   {
    

   }
   public function getid()
   {
   	  if(isset($_GET["id"]))
   	  {
      $id=$_GET["id"];
      return $id;
      }
   }

}
$studentid = new getstudentid();
$studentid = $studentid->getid();
?>
<html>
<head><h1><center>ARE YOU SURE YOU WANT TO DELETE STUDENT</center></h1></head>
<body>

	<form name="f1" method="post" action="studentController.php">
	<span style="padding-right:15px;"></span><a href="list.php">NO</a></center>
	<input type="hidden" name="deletestudentid" value="<?php echo $studentid;?>">
	<input type="submit" name="delsubmit" value="yes">
</form>
</body>
</html>
