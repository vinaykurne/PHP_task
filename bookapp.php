<?php 
	include "connect.php";
	$id=$_GET['id'];
	$query="SELECT * from dataset where id='$id'";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_assoc($result))
	{
		$Name=$row['Name'];
		$TimeZone=$row['TimeZone'];
		$Day_Of_Week=$row['Day_Of_Week'];
		$Avaliabl_At=$row['Avaliabl_At'];
		$Avaliable_Untill=$row['Avaliable_Untill'];
	}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 	<style type="text/css">
 		th,td
 		{
 			padding: 20px;
 		}
 		input
 		{
 			width: 250px;
 			height: 50px;
 			border-radius: 20px;
 		}
 	</style>
 </head>
 <body>
 	<center>
 		<h1>Book Appointment</h1>
 		<form method="post" action="">
 			
 			<table>
 				<tr>
 					<th>Customer Name</th>
 					<td><input type="text" name="cname"></td>
 				</tr>
 				<tr>
 					<th>Customer Contact</th>
 					<td><input type="text" name="contact"></td>
 				</tr>
 				<tr>
 					<th>Coach Name</th>
 					<td><input type="text" name="coach_name" value="<?php echo $Name ;?>" readonly></td>
 				</tr>
 				<tr>
 					<th>Avaliable Day</th>
 					<td><input type="text" name="avday" value="<?php echo $Day_Of_Week ;?>" readonly></td>
 				</tr>
 				<tr>
 					<th>Avaliable Time</th>
 					<td><input type="text" name="avtime" value="<?php echo $Avaliabl_At ;?>" readonly></td>
 				</tr>
 				<tr>
 					<th>Date</th>
 					<td><input type="date" name="bookdate" ></td>
 				</tr>

 				<tr>
 					<th>Time</th>
 					<td><input type="time" name="book_time"></td>
 				</tr>
 			</table>
 			<input type="submit" value="BOOK Appoitment" name="book">
 		</form>
 	</center>
 	<?php 
 		if(isset($_POST['book']))
 		{
 			$bdate=$_POST['bookdate'];
 			$cname=$_POST['cname'];
 			$contact=$_POST['contact'];
 			$coach_name=$_POST['coach_name'];
 			$avday=$_POST['avday'];
 			$avtime=$_POST['avtime'];
 			$bdate=$_POST['bookdate'];
 			$book_time=$_POST['book_time'];
 			$dayofweek = date('D', strtotime($bdate));
 			$dayofav = date('D', strtotime($avday)); 			
 			if($dayofav==$dayofweek)
 			{
 				if($book_time>=$avtime and $book_time<=$Avaliable_Untill)
 				{
 					$insert="INSERT into customer values('0','$cname','$contact','$bdate','$book_time','$coach_name') ";
 					$result1=mysqli_query($conn,$insert);
 					if($result1)
 					{
 						echo "<script>
 						alert('Appointment Booked');
 						window.location=('index.php');
 						</script>";
 					}
 					else
 					{
 						echo "<script>
 						alert('Appointment Booked Failed');
 						window.location=('index.php');
 						</script>";
 					}
 				}
 				else
 				{
 					echo "<script>
 						alert('Time slot not available');
 						
 						</script>";
 				}
 			}
 			else
 			{
 				echo "<script>
 						alert('Appointment Day not avaliable');
 						
 						</script>";
 			}

 		}




 	 ?>
 	 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
 </html>