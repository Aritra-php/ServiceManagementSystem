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
<!-------------------Start PHP Code---------------------------->
<?php
session_start();
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="userlogin.php"</script>';
}
?>
<?php
$sql="SELECT *FROM addtechnican WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$aName=$row['aName'];
$rAddress=$row['rAddress'];
$rCity=$row['rCity'];
$rPin=$row['rPin'];
$rPhno=$row['rPhno'];
$rDate=$row['rDate'];
$rName=$row['rName'];
$rProduct=$row['rProduct'];
$rYears=$row['rYears'];
$rNotWorking=$row['rNotWorking'];
$rNewPart=$row['rNewPart'];
$tName=$row['tName'];
$tEmail=$row['tEmail'];
$tAddress=$row['tAddress'];
$tPhno=$row['tPhno'];
$tRepDay=$row['tRepDay'];
?>
<!-------------------End PHP Code------------------------------>

<!----------------------Start HTML From--------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>Checkservicingstatus.com</title>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="POST" class="shadow-lg p-5">

<h5 class="text-dark">You Can Check Your Servicing Status Here</h5>

<div class="form-group">
<label for="User Name">User Name</label>
<input type="text" placeholder="Type The User Name Here" name="aName" class="form-control"
value="<?php echo $aName; ?>">
</div>

<br/>

<div class="form-group">
<label for="User Email">User Email</label>
<input type="text" placeholder="Type The User Email Here" name="rEmail" class="form-control"
value="<?php echo $rEmail; ?>">
</div>

<br/>

<div class="form-group">
<label for="User Address">User Address</label>
<input type="text" placeholder="Type The User Address Here" name="rAddress" class="form-control"
value="<?php echo $rAddress; ?>">
</div>

<br/>

<div class="form-group">
<label for="User City">User City</label>
<input type="text" placeholder="Type The User City Here" name="rCity" class="form-control"
value="<?php echo $rCity; ?>">
</div>

<br/>

<div class="form-group">
<label for="PinCode">PinCode</label>
<input type="text" placeholder="Type The User Pin Code Here" name="rPin" class="form-control"
value="<?php echo $rPin; ?>">
</div>

<br/>

<div class="form-group">
<label for="User Phone Number">User Phone Number</label>
<input type="text" placeholder="Type The User Phone Number Here" name="rPhno" class="form-control"
value="<?php echo $rPhno; ?>">
</div>

<br/>

<div class="form-group">
<label for="Date Of Submission">Date Of Submission</label>
<input type="text" name="rDate" class="form-control"
value="<?php echo $rDate; ?>">
</div>

<br/>

<div class="form-group">
<label for="Name Of The Product">Name Of The Product</label>
<input type="text" placeholder="Type The Name Of The Product" name="rName" class="form-control"
value="<?php echo $rName; ?>">
</div>

<br/>

<div class="form-group">
<label for="Product Company">Product Company</label>
<input type="text" placeholder="Type Your Product's Company Name" name="rProduct" class="form-control"
value="<?php echo $rProduct; ?>">
</div>

<br/>

<div class="form-group">
<label for="No. Of Years Product Used">No. Of Years Product Used</label>
<input type="text" placeholder="Type The No. Of Years The Product Is Being Used" name="rYears" class="form-control"
value="<?php echo $rYears; ?>">
</div>

<br/>

<div class="form-group">
<label for="Parts Not Working">Parts Not Working</label>
<input type="text" placeholder="Type The Parts Which Are Not Working" name="rNotWorking" class="form-control"
value="<?php echo $rNotWorking; ?>">
</div>

<br/>

<div class="form-group">
<label for="Do You Want A New Part To Be Replaced With The Old Part">Do You Want A New Part To Be Replaced With The Old Part:</label>
<input type="text" name="rNewPart" class="form-control"
value="<?php echo $rNewPart; ?>">
</div>

<br/>

<div class="form-group">
<label for="Technician Name">Technician Name</label>
<input type="text" placeholder="Type The Technician Name Here" name="tName" class="form-control"
value="<?php echo $tName; ?>">
</div>

<br/>

<div class="form-group">
<label for="Technician Email">Technician Email</label>
<input type="text" placeholder="Type The Technician Email Here" name="tEmail" class="form-control"
value="<?php echo $tEmail; ?>">
</div>

<br/>

<div class="form-group">
<label for="Technician Address">Technician Address</label>
<input type="text" placeholder="Type The Technician Address Here" name="tAddress" class="form-control"
value="<?php echo $tAddress; ?>">
</div>

<br/>

<div class="form-group">
<label for="Technician Phone Number">Technician Phone Number</label>
<input type="text" placeholder="Type The Technician Phone Number Here" name="tPhno" class="form-control"
value="<?php echo $tPhno; ?>">
</div>

<br/>

<div class="form-group">
<label for="Reporting Day">Reporting Day</label>
<input type="text" name="tRepDay" class="form-control"
value="<?php echo $tRepDay; ?>">
</div>

<br/>

<a href="userprofile.php" class="btn btn-info">Back To Profile</a>

<a href="#" onclick="window.print()" value="Print Form" class="hoverNoLine"><button class="btn btn-primary btn-block"><em class="fa fa-print"></em>&nbsp;Print Form</button></a>
</form>

</div>
</div>
</div>

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
<!-------------------End HTML Form--------------------------->