<!DOCTYPE HTML >
<html>
<head>
  <title>Booking</title>
<link rel="stylesheet" type="text/css" href="../css/chhutti.css"> 
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/registration.css"> 
<style>
   button {
    
}
</style>
</head>

<body>
  
<div class="main">

<ul>
<li><a href="index.php">Logout</a></li>
</ul>

</div>

<div id="title">
<h1><span id="a">CH</span><span id="b">HU</span><span id="d"></span><span id="c">TTI</span> </h1>
</div>


<?php
include('../include/db_con.php');
session_start();
if(isset($_POST['sub']))
{
$username=$_POST['username'];
$roomtype=$_POST['field_1'];
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$room_nos=$_POST['room_nos'];
$amount=$_POST['roomprice'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysqli_query($con,$checkroom);
$roomcount=mysqli_fetch_array($check,MYSQLI_NUM);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$s1="INSERT INTO roomdetail (username,checkin_date,checkout_date,room_type,no_of_room,amount)VALUES('".$username."','".$startdate."','".$enddate."','".$roomtype."','".$room_nos."','".$amount."')";
mysqli_query($con,$s1);
header("location:registration.php?success=true");
}
}
?>

<?php if(isset($_GET['success'])){
		echo '<h4> Your room Booked successfully,You will be contacted soon. !!!</h4>';
  }?>
  
<div id="h3">
    
 <h3> User:   <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></h3>

</div>
	<div id="main">
	<form action="registration.php" method="POST">
	<h2 align="center" id="h">Book Room</h2>
  
 <table>
		
          <tr>
            <td>Check in Date</td>
            <td>
              <input  name="startdate1" type="date"  required value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?>"  /></td>
			  <td>Check out Date</td>
            <td>
              <input  name="enddate1" type="date" required value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?>" onchange='this.form.submit()'  /></td>
          </tr>
          <tr>
		  <td>Location</td>
		  <td><select>
		  <option>Kathmandu</option>
		  <option>Dhulikhel</option>
		  <option>Pokhara</option>
		  <option>Lumbini</option>
		  </select></td>
     
		  <td>Hotel</td>
		  <td><select>
		  <option>Gaia home</option>
		  <option>Access Nepal</option>
		  <option>Everest</option>
      <option>Mani homes</option>
      <option>Unique Mountain</option>
      <option>Truley Asia</option>
		  </select></td>
		  </tr>
      
		</form>
		<form action="registration.php" method="POST">
       
		
          <tr>
            <td></td>
            <td>
              <input name="startdate" type="hidden" value=" <?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; }?> " /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?>"  />
              <input name="enddate" type="hidden" value=" <?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }?> "  /></td>
          </tr>
		  <tr>
			<td>Room Type </td>
            <td>
              <select class="text_select" id="field_1" name="field_1" >  
<option value="00">- Select -</option>   
<?php if(isset($_POST['startdate1'])){
$paymentDate = $_POST['startdate1'];
$contractDateBegin = '2013-12-20';
$contractDateEnd ='2014-03-25';

$s2="select * from roomtype";
$s3=mysqli_query($con,$s2);


?>
<?php while($catdata=mysqli_fetch_array($s3,MYSQLI_ASSOC)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
           <?php } ?>
		   <?php } ?>
           </select></td>
          
            <td>Price per Room</td>
            <td>
             <span id="a1" >Rs.</span>
           </td>
       </tr>
		   <tr>
            <td>No. of Guest per Room</td>
            <td>
              <input name="guest" type="text" required  /></td>
      
            <td>No. of Rooms </td>
            <td>
              <input name="room_nos" id="room_nos" type="text"  onChange="gettotal1()" required  /></td>
          </tr>
		  <tr>
            <td>Total Amount To Pay</td>
            <td>
             <input type="text" name="roomprice" id="total1"   readonly="" />
           </td>
          
            <td colspan="2" align="center">
			<button type="submit" name="sub" value="Pay & Book" />Book</button></td>
            </tr>
			
      
		</form>
</table>
</div>
		<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
 var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('room_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
	
   }
			</script>
 
		
	
</body>
</html>