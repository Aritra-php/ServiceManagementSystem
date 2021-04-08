<!--------------------Start Database Connection---------------->
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="sms";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die("Connection Failed");
}
?>
<!--------------------End Database Connection------------------>

<!-------------------start Bootstarp code-------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>servicingformrequesters.com</title>
</head>
<body>
<h5 class="text-dark">All The Details Of The User Who has Applied For Servicing Will Be Fetched Here</h5>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
-->
</body>
</html>
<!------------------End Bootstrap code---------------------------->

<!---------------Start PHP Code for fetch data from t-2----------------------->
<?php
$sql="SELECT *FROM servicingform";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
echo '<table border="1">';
echo "<tr>";
echo "<thead>";
echo "<th>Name</th>";
echo "<th>Email</th>";
echo "<th>Address</th>";
echo "<th>City</th>";
echo "<th>PinCode</th>";
echo "<th>Phone Number</th>";
echo "<th>Date</th>";
echo "<th>Product Name</th>";
echo "<th>Product Company</th>";
echo "<th>Years</th>";
echo "<th>Parts Not Working</th>";
echo "<th>New Parts</th>";
echo "<th>Image Of The Product</th>";
echo "<th>Add Technician</th>";
echo "</thead>";
echo "</tr>";
echo "<tbody>";
while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";
echo "<td>".$row['aName']."</td>";
echo "<td>".$row['rEmail']."</td>";
echo "<td>".$row['rAddress']."</td>";
echo "<td>".$row['rCity']."</td>";
echo "<td>".$row['rPin']."</td>";
echo "<td>".$row['rPhno']."</td>";
echo "<td>".$row['rDate']."</td>";
echo "<td>".$row['rName']."</td>";
echo "<td>".$row['rProduct']."</td>";
echo "<td>".$row['rYears']."</td>";
echo "<td>".$row['rNotWorking']."</td>";
echo "<td>".$row['rNewPart']."</td>";
echo '<td><img src="images1/'.$row['rImage'].'"></td>';
echo '<td><form action="" method="POST">
<input type="hidden" name="Srno" value='.$row['Srno'].'>
<input type="submit" value="Add Tehnician" name="raddtech">
</form></td>';
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
}
else
{
echo "Data Not Found";
}
?>
<!---------------End PHP Code for fetch data from t-2------------------------->
<?php
if(isset($_REQUEST['raddtech']))
{
echo '<script>location.href="addtechnician.php"</script>';
}
?>
