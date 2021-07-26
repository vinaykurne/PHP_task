<?php 	

		include "connect.php"



 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title>	</title>
 	<style>
 		td , th
 		{
 			padding: 10px;
 		}
 	</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <body>
 	<center> <p><b>Coaches Timing</b></p>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Time Zone</th>
      <th scope="col">Day of Week</th>
      <th scope="col">Avaliable At</th>
      <th scope="col">Avaliable Until</th>
    </tr>
  </thead>
  <tbody>
    
    <?php   

                    $display="SELECT * from dataset";
                    $res=mysqli_query($conn,$display);
                    while($row=mysqli_fetch_assoc($res))
                    { ?>
    <tr>
      
      <td><?php    echo $row['id']; ?></td>
      <td><?php     echo $row['Name']; ?></td>
                            <td><?php   echo $row['TimeZone']; ?></td>
                            <td><?php   echo $row['Day_Of_Week']; ?></td>
                            <td><?php   echo $row['Avaliabl_At']; ?></td>
                            <td><?php   echo $row['Avaliable_Untill']; ?></td>
                            <td><input type="button" value="Book Appoitnment" onclick="window.location='bookapp.php?id=<?php    echo  $row['id']; ?>'"></td>
    </tr>
   
  </tbody>
  <?php  }


                 ?>
</table>
 			


 					
 			</table>
 	</center>		
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
 </html>