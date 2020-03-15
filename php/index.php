<!DOCTYPE HTML>
<html>
<head>
<title>Costumer</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/chhutti.css">
<style type="text/css">
	
button {
		background-color: #00BFFF;
		color: white;
		font-size:30px;
		padding:;
		margin: 10px;
		border: none;
		border-radius: 12px;
		font-family: montserrat;
		cursor: pointer;
		width: 120px;
		opacity: 0.7;
		align:center;
		margin-left:70px;
}

input[type=text], input[type=password], input[type=email] {
  width: ;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  border-radius:12px;
  background: #f1f1f1;
}

button:hover {
  opacity:1;
}

#login{
  background-image:url('../image/back.jpg') ;
  padding: 10px 30px;
  letter-spacing: 1px;
  font-size: 16px;
  width :600px;
  height:200px;
  background-color: rgba(255,255,255,0.5);
  border-radius: 20px;
  box-shadow: 0 22px 26px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  position:absolute;
  top:100px;
  left:1050px;
  font-size:25px;
  opacity:0.8;
}

#login > h2{
	margin-bottom:20px;
}
#login > button{
	margin-left:250px;
}
#signup > button{
	margin-left:250px;
}
#signup{
  background-image:url('../image/back.jpg') ;
  padding: 10px 30px;
  letter-spacing: 1px;
  font-size: 16px;
  width :800px;
  height:600px;
  background-color: rgba(255,255,255,0.5);
  border-radius: 20px;
  box-shadow: 0 22px 26px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  position:absolute;
  top:200px;
  left:80px;
  font-size:25px;
  color:white ;
  font-weight:bold;
  opacity:0.8;
}
#signup:hover{
	border-radius: 40px;
    box-shadow: 0 40px 40px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	transition:0.5s;
	opacity:1;
}
#signup table{
	margin-left:90px;
	margin-top:40px;
	padding:20px;
}
#signup>h2{
	margin-bottom:20px;
	margin-top:20px;
}
#image > img {
  position:absolute;
  top:200px;
  left:50px;
  height:520px;
  width:800px;
}
#signup:hover{
	border-radius: 40px;
    box-shadow: 0 40px 40px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	transition:0.5s;
	opacity:1;
}
h4{
	position:absolute;
	top:50px;
	left:200px;
}
</style>
</head>

<body>

<div class="main">
<ul>
<li><a href="../index.html">Home</a></li>
<li><a href="../html/gallery.html">Gallery</a></li>
<li><a href="../html/about.html">About Us</a></li>
<li><a href="../html/contact.html">Contact</a></li>
<li>Login
<ul>
<li><a href="index.php">customer</a></li>
<li><a href="../admin/index.php">admin</a></li>
</ul>
</li>
</ul>
</div>
<div id="title">
<h1><span id="a">CH</span><span id="b">HU</span><span id="d"></span><span id="c">TTI</span> </h1>

<?php  if (isset($error)) {?>
	
</div>


<H4>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
		   <?php } ?>
</H4>

<?php 
include('../include/db_con.php');
	session_start();
if(isset($_POST['Submit']))
{
$fn=$_POST['firstname'];
$ln=$_POST['lastname'];
$phone=$_POST['daytimephone'];
$email=$_POST['email'];
$pass=$_POST['password1'];
$city=$_POST['city'];
$country=$_POST['country'];
$intr=$_POST['usertype'];

$query1="INSERT INTO users (first_name,last_name,day_phone,user_name,user_password,city,country,payment_type) VALUES('".$fn."','".$ln."','".$phone."','".$email."','".$pass."','".$city."','".$country."','".$intr."')";
if (!mysqli_query($con,$query1))
  {
  echo("Error description: " . mysqli_error($con));
  }
}
?>
<?php 
		if (isset($_POST['username'],$_POST['password']))
			{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$login="select * from users where user_name='".$username."' and user_password ='".$password."'";
			$result=mysqli_query($con,$login);
			if(mysqli_fetch_array($result,MYSQLI_NUM)){
				$_SESSION['logged_in']='true';
				$_SESSION['username']=$username;
				header('Location: registration.php');
			} else {
				$error='Incorrect details !!';
			}
		}
  
  ?>

<div id="signup">
<h2  align="center" style="color:red">Reigester account </h2>
<table>
 <form  method="POST" name="signupform" action="index.php" onSubmit="return signup();" >
	 <tr>
		<td><input placeholder="First Name" name="firstname" type="text" id="firstname" size="40"  required/></td>
		<td><input placeholder="Last Name" name="lastname" type="text" id="lastname" size="40"  required /></td>
	</tr>

	<tr>
	<td><input placeholder="Password" name="password1" type="password" id="password1" size="40"  required/></td>
	<td><input placeholder="Confirm Password" name="password2" type="password" id="password2" size="40" required /></td>
	</td>
	</tr>

	<tr>
		<td><input placeholder="City" name="city" type="text" id="city" size="40" required  /></td>
		<td><input placeholder="Country" name="country" type="text" id="country" size="40"  required/></td>
	</tr>

	<tr>
		<td><input  placeholder="email" name="email" type="email" id="email" size="40" required  /></td>
		<td><input placeholder="Phone no" name="daytimephone" type="text" id="daytimephone" size="40" class="phone" required /></td>
	</tr>

	<tr>
		<td>Payment Type:</td>
		<td><input type="radio" name="usertype" id="usertype1" value="cash" />Cash
		<input type="radio" name="usertype" id="usertype2" value="esewa" />Esewa
		<input type="radio" name="usertype" id="usertype3" value="ime" />IME pay
	    </td>
	</tr>

	<tr id="last">
	<td><button type="submit" name="Submit" value="Submit" /> Register</button></td>
	<td><button type="reset" name="reset" value="Reset"  />Reset</button></td>
	</tr>
    </form>
</div>



<div id="login">
	
	<form action="index.php" method="POST">
	
		 
		     <h2 align="center" id="h">Customer Login</h2>
         
              <input placeholder="email" name="username" type="emaIl"  size="40" required />
		
              <input placeholder="password" name="password" type="password"  size="40" required />

			<button  type="submit" name="sub" value="Login" >Login</button>
			
	</form>
</div>

</body>
</html>