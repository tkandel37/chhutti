<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/chhutti.css">
<style type="text/css">
	#contenair{
		position:absolute;
		top:30vh;
		left:80vh;
		
	}
	#r{
		position:absolute;
		top:8vh;
		left:13vh;
	}
	#h{
		color:ligtred;
		font-size:40px;
		margin-bottom:10px;
		text-decoration:red underline;
	}
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
		width: 50%;
		opacity: 0.3;
		align:center;
		margin-left:70px;
}

button:hover {
  opacity:1;
}
input[type=text], input[type=password] {
  width: ;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  border-radius:12px;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
#contenair {
  padding: 10px 30px;
  letter-spacing: 1px;
  font-size: 16px;
  width :600px;
  height:400px;
  background-color: rgba(255,255,255,0.5);
  border-radius: 20px;
  box-shadow: 0 22px 26px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
h4{
	margin-bottom:10px;
	font-family: montserrat;
	font-size:20;
	}
	</style>
</head>
<body>

<header>
<div class="main">
<ul>
<li><a href="../index.html">Home</a></li>
<li><a href="../html/gallery.html">Gallery</a></li>
<li><a href="../html/about.html">About Us</a></li>
<li><a href="../html/contact.html">Contact</a></li>
<li>Login
<ul>
<li><a href="../php/index.php">customer</a></li>
<li><a href="index.php">admin</a></li>
</ul>
</li>
</ul>
</div>
<div id="title">
<h1><span id="a">CH</span><span id="b">HU</span><span id="d"></span><span id="c">TTI</span> </h1>
</div>
</header>

<div id="contenair">
	<div id="r" >
	
	<?php 
	include('../include/db_con.php');
	session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'Fill all the spaces';
                    }
                     
					 else {  
					 $login="select * from users where user_name='".$username."' and user_password ='".$password."'";
					 $result=mysqli_query($con,$login);
					
				
					 
					if(mysqli_fetch_array($result,MYSQLI_ASSOC)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:adminpanal.php');
					 exit();
					 } else {
					 $error='Either Username or Password is incorrect';
					 }
					       }
		}
  
  ?>
	<form action="index.php" method="POST">
	<h2 align="center" id="h">Admin Login</h2>
        <table align="center">
		<tr> <?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
          <tr>
            <td width="113"><h4>Email:<h4></td>
            <td width="215">
              <input name="username" type="text"  size="40" /></td>
          </tr>
          <tr>
            <td><h4>Password:<h4></td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
			<button type="submit" name="sub" value="Login" />Login</td>
            </tr>
			
       </table>
		</form>
		
		
	</div>
</div>
</body>
</html>