<?php
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,"college");
$limit=5;
if(isset($_GET["page"]))
{
$page=$_GET["page"];
}
else
{
$page="";
}
if($page=="" || $page=="1")
{
	$page1=0;
}
else
{
	$page1=($page*5)-5;

}
$newresult=mysqli_query($con,"select * from student limit $page1,$limit");
while($row=mysqli_fetch_array($newresult))
{
	echo $row["Name"]."<br>";
	echo $row["age"]."<br>";
	echo $row["gender"]."<br>";
	echo $row["address"]."<br>";
	echo $row["rollno"]."<br>";
}

$result=mysqli_query($con,"select * from student");
$count=mysqli_num_rows($result);
$offset=$count/$limit;
$offset=ceil($offset);
echo "<br>";
echo "<br>";
echo "<br>";
for($i=1;$i<=$offset;$i++)
{
?>
<a href="paging.php?page=<?php echo $i;?>" style="text-decoration:none;"><?php echo $i;?></a>
<?php
}

?>