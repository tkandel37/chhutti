
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>
<?php
include('../include/db_con.php');

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="delete from roomdetail where id='".$id."'";
mysqli_query($con,$sql);

header("location:adminpanal.php");
}
?>
</body>
</html>
