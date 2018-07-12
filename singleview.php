<?php
 if(isset($_GET["deleted"]))
 {
   $deletemessage=$_GET["deleted"];
 }
 if(isset($_GET["page"]))
 {
   $linkno = $_GET["page"];
 }
// class viewlist
// {
//    public function __construct()
//    {
//       include 'studentModel.php';
//    }
//    public function callstudentmodel($table)
//    {
//          $getstudentdata = new studentModel();
//          $listdata = $getstudentdata->selectdata($table);
//          return $listdata;
//    }

// }

include 'studentModel.php';
$table="student";
$getstudentdata = new studentModel();
$limit="5";
$listdata = $getstudentdata->selectdata($table,$limit,$linkno);
?>
<html>
<head><h1><center>VIEW STUDENT DETAILS</center></h1></head>
<body>
   <table border=1>
      <tr><td>NAME</td><td>AGE</td><td>GENDER</td><td>ADDRESS</td><td>ROLL NO</td><td>ACTION</td></tr>
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
            <td><a href="viewindividualdata.php?singleid=<?php echo $data["id"];?>">VIEW</a></td>
         </tr>


       <?php
      }
      ?>
   </table>
   <?php
   for($i=1;$i<=10;$i++)
{
?>
<a href="singleview.php?page=<?php echo $i;?>" style="text-decoration:none;"><?php echo $i;?></a>
<?php
}
?>
   <a href="view.php">BACK</a>
</body>
</html>