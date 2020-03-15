<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<style type="text/css">
	#contenar{
		height: 100%;
		width: 100%;
		
	}
	#r{
		margin-top: 5%;
		margin-bottom: 5%;
		margin-right: 5%;
		margin-left: 5%;
		float: center;
		background-color: #b7bcbd;
		
	}

	</style>
	

     
</head>

<body>
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
$id = $_POST['id'];

$checkroom= "select count(*) from roomdetail where room_type='".$roomtype."' ";
$check=mysqli_query($con,$checkroom);
$roomcount=mysqli_fetch_array($check,MYSQLI_ASSOC);
 $checkcount=$roomcount[0];
if($checkcount>=10)
{
?> <script>alert("Sorry Rooms Are not Available :( please try another Option !!");</script>
<?php }
else{
$sql1="UPDATE roomdetail set username='".$username."',checkin_date='".$startdate."',checkout_date='".$enddate."',room_type='".$roomtype."',no_of_room='".$room_nos."',amount='".$amount."' where id='".$id."'";
mysqli_query($con,$sql1);
header("location:adminpanal.php");
}
}
?>

<div id="contenar">
<?php
if(isset($_GET['id']))
{
$id=$_GET['id'];
$getdata= "select * from roomdetail where id='".$id."' ";
$check1=mysqli_query($con,$getdata);
$room=mysqli_fetch_array($check1,MYSQLI_ASSOC);
}
?>
	<div id="r">
	<form action="update.php" method="POST">
	<h2 align="center" id="h"><u><i>Book Room</i></u></h2>
	<h3> Welcome <?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } if(isset($_GET['id'])){ echo $room['username']; }  ?> !!!</h3>
        <table >
		
          <tr>
            <td width="113">Check in Date</td>
            <td width="215">
			<?php if(isset($_GET['id'])){ ?>
			 <input name="roomid" type="hidden"  value="<?php if(isset($_GET['id'])){ echo $_GET['id']; }  ?>" /> <?php } ?>
              <input name="startdate1" type="date"  value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1']; } if(isset($_GET['id'])){ echo $room['checkin_date']; }  ?>" /></td>
          </tr>
          <tr>
            <td>Check out Date</td>
            <td>
              <input name="enddate1" type="date" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; }if(isset($_GET['id'])){ echo $room['checkout_date']; }  ?>" onchange='this.form.submit()' /></td>
          </tr>
			
       </table>
		</form>
		<form action="update.php" method="POST">
        <table >
		<?php if(isset($_POST['roomid'])){ ?>
			 <input name="id" type="hidden"  value="<?php if(isset($_POST['roomid'])){ echo $_POST['roomid']; }  ?>" /> <?php } ?>
          <tr>
            <td width="113"></td>
            <td width="215">
              <input name="startdate" type="hidden" value="<?php if(isset($_POST['startdate1'])){ echo $_POST['startdate1'];  } if(isset($_GET['id'])){ echo $room['checkin_date']; }?>" /></td>
          </tr>
          <tr>
            <td></td>
            <td><input name="username" type="hidden" value="<?php session_start(); if(isset($_SESSION['username'])){ echo $_SESSION['username']; } if(isset($_GET['id'])){ echo $room['username']; }  ?>"  />
              <input name="enddate" type="hidden" value="<?php if(isset($_POST['enddate1'])){ echo $_POST['enddate1']; } if(isset($_GET['id'])){ echo $room['checkout_date']; }?>"  /></td>
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

if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd))
{
 $s2="select * from roomtype where room_seson ='high season' ";
$s3=mysqli_query($con,$s2);
}
else
{
$s2="select * from roomtype where room_seson='low season' ";
$s3=mysqli_query($con,$s2);
}


?>
<?php while($catdata=mysqli_fetch_array($s3,MYSQLI_ASSOC)) { ?>  <option value="<?php echo $catdata['room_price']; ?>"><?php echo $catdata['room_type']; ?></option>
           <?php } ?>
		   <?php } ?>
           </select></td>
          </tr>
		  <tr>
            <td>Price per Room</td>
            <td>
             <span id="a1"><?php if(isset($_GET['id'])){ echo $room['room_type']; }?></span>$
           </td>
          </tr>
		   <tr>
            <td>No. of Guest per Room</td>
            <td>
              <input name="guest" type="text " value="<?php if(isset($_GET['id'])){ echo $room['no_of_room']; }?>" size="10"/></td>
          </tr>
		  <tr>
            <td>No. of Rooms </td>
            <td>
              <input name="room_nos" id="room_nos" type="text " value="<?php if(isset($_GET['id'])){ echo $room['no_of_room']; }?>" size="10" onChange="gettotal1()" /></td>
          </tr>
		  <tr>
            <td>Total Amount To Pay</td>
            <td>
             <input type="text" name="roomprice" id="total1" value="<?php if(isset($_GET['id'])){ echo $room['amount']; }?>"  size="10px" readonly="" />
           </td>
          </tr>
		  
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Pay & Book" /></td>
            </tr>
			
       </table>
		</form>
		
		<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("field_1");
var strUser = e.options[e.selectedIndex].value;
 var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("field_1").onchange = notEmpty;


   function gettotal1(){
      var priceperroom=document.getElementById('a1').innerHTML;
      var roomnos=document.getElementById('room_nos').value;
      var totalamount=parseFloat(priceperroom)* parseFloat(roomnos);
			
      document.getElementById('total1').value=totalamount;
	
   }
			</script>
 
		
	</div>
</div>
</body>
</html>