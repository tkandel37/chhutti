
<html>
<head>

<title>Admin </title></head>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/chhutti.css">
<style>
	table {
  border-collapse: collapse;
}

table, tr, td {
  border: 1px solid black;
}
tr{
	width:150px;
	text-align:center;
}
td{
	width:180px;
	text-align:center;
}
#admin{
	padding: 10px 30px;
    letter-spacing: 1px;
    font-size: 16px;
    background-color: rgba(255,255,255,0.5);
    border-radius: 20px;
    box-shadow: 0 22px 26px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    position:absolute;
    top:200px;
    left:200px;
    font-size:25px;
    opacity:0.6;
    transition:1s;
    filter:blur(0.5px);
}
#admin:hover{
      opacity:1;
      filter:blur(0px);

  }
#h1{
	position:absolute;
	top:50px;
	left:600px;
	font-size:60px;
}
</style>

<body>
	<h1 id="h1">Admin</h1>

<div class="main">

<ul>
<li><a href="../admin/index.php">logout</a></li>
</ul>
</li>
</ul>
</div>

<div id="title">
<h1><span id="a">CH</span><span id="b">HU</span><span id="d"></span><span id="c">TTI</span> </h1>
</div>
<div id="admin">
	  <h2 align="center">All Booking</h2>
	  <table border="1">
	  <tr>
	  <td>Sn</td>
	  <td>Username</td>
	  <td>Checkin </td>
	  <td>Checkout</td>
	  <td>Room type</td>
	  <td>No.of Room</td>
	  <td>Amount</td>
	  </tr>
	  </table>
	  <?php
	  include('../include/db_con.php');
	  $sql="select * from roomdetail ";
	  $row=mysqli_query($con,$sql);
	 
	  ?><table border="1">
	  <?php
	  
	  while($data=mysqli_fetch_array($row,MYSQLI_ASSOC))
	  {
	  ?>
	  <tr>
	  <td><?php echo $data['id']; ?></td>
	  <td><?php echo $data['username']; ?></td>
	  <td><?php echo $data['checkin_date']; ?></td>
	  <td><?php echo $data['checkout_date']; ?></td>
	  <td><?php echo $data['room_type']; ?></td>
	  <td><?php echo $data['no_of_room']; ?></td>
	  <td><?php echo $data['amount']; ?></td>
	  <?php echo '<td><a href="delete.php?id='.$data["id"].'">delete</a></td>'; ?>
	  </tr>
	  <?php
	  }
	  
	  
	  ?>
	  </table>
	  </div>

</body>
</html>
