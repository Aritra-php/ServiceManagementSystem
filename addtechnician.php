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

<!--------------------Start PHP Code For Entering Data------------>
<?php
if(isset($_REQUEST['rSubmit']))
{
if(($_REQUEST['aName']=="")||($_REQUEST['rEmail']=="")||
($_REQUEST['rAddress']=="")||($_REQUEST['rCity']=="")||
($_REQUEST['rPin']=="")||($_REQUEST['rPhno']=="")||empty($_REQUEST['rDate'])||($_REQUEST['rName']=="")||($_REQUEST['rProduct']=="")||($_REQUEST['rYears']=="")||($_REQUEST['rNotWorking']=="")||empty($_REQUEST['rNewPart'])||($_REQUEST['tName']=="")||($_REQUEST['tEmail']=="")||($_REQUEST['tAddress']=="")||($_REQUEST['tPhno']=="")||empty($_REQUEST['tRepDay']))
{
$msg='<div class="alert alert-warning mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$aName=$_REQUEST['aName'];
$rEmail=$_REQUEST['rEmail'];
$rAddress=$_REQUEST['rAddress'];
$rCity=$_REQUEST['rCity'];
$rPin=$_REQUEST['rPin'];
$rPhno=$_REQUEST['rPhno'];
$rDate=$_REQUEST['rDate'];
$rName=$_REQUEST['rName'];
$rProduct=$_REQUEST['rProduct'];
$rYears=$_REQUEST['rYears'];
$rNotWorking=$_REQUEST['rNotWorking'];
$rNewPart=$_REQUEST['rNewPart'];
$tName=$_REQUEST['tName'];
$tEmail=$_REQUEST['tEmail'];
$tAddress=$_REQUEST['tAddress'];
$tPhno=$_REQUEST['tPhno'];
$tRepDay=$_REQUEST['tRepDay'];
$sql="INSERT INTO addtechnican(aName,rEmail,rAddress,rCity,rPin,rPhno,rDate,rName,rProduct,rYears,rNotWorking,
rNewPart,tName,tEmail,tAddress,tPhno,tRepDay)VALUES('$aName','$rEmail','$rAddress','$rCity',
'$rPin','$rPhno','$rDate','$rName','$rProduct',
'$rYears','$rNotWorking','$rNewPart','$tName','$tEmail','$tAddress','$tPhno','$tRepDay')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-3 text-center">Request Received Successfully</div>';
}
else
{
$msg='<div class="alert alert-warning mt-3 text-center">Unable To Receive Request</div>';
}
}
}
?>
<!--------------------End PHP Code For Entering Data--------------->

<!--------------------Start Add Technician Form----------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>AddTechnician.com</title>
</head>
<body>

<div class="conatiner">
<div class="row">
<div class="col-sm-12">



<br/>

<form action="" method="post" class="shadow-lg p-5">

<h5 class="text-dark">Welcome To Add Technician Page</h5>

<div class="form-group">
<label for="User Name">User Name</label>
<input type="text" placeholder="Type The User Name Here" name="aName" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="User Email">User Email</label>
<input type="text" placeholder="Type The User Email Here" name="rEmail" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="User Address">User Address</label>
<input type="text" placeholder="Type The User Address Here" name="rAddress" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="User City">User City</label>
<input type="text" placeholder="Type The User City Here" name="rCity" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="PinCode">PinCode</label>
<input type="text" placeholder="Type The User Pin Code Here" name="rPin" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="User Phone Number">User Phone Number</label>
<input type="text" placeholder="Type The User Phone Number Here" name="rPhno" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Date Of Submission">Date Of Submission</label>
<input type="date" name="rDate" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Name Of The Product">Name Of The Product</label>
<input type="text" placeholder="Type The Name Of The Product" name="rName" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Product Company">Product Company</label>
<input type="text" placeholder="Type Your Product's Company Name" name="rProduct" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="No. Of Years Product Used">No. Of Years Product Used</label>
<input type="text" placeholder="Type The No. Of Years The Product Is Being Used" name="rYears" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Parts Not Working">Parts Not Working</label>
<input type="text" placeholder="Type The Parts Which Are Not Working" name="rNotWorking" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Do You Want A New Part To Be Replaced With The Old Part">Do You Want A New Part To Be Replaced With The Old Part:</label>
Yes<input type="radio" name="rNewPart" value="Yes">
No<input type="radio" name="rNewPart" value="No">
</div>

<br/>

<div class="form-group">
<label for="Technician Name">Technician Name</label>
<input type="text" placeholder="Type The Technician Name Here" name="tName" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Technician Email">Technician Email</label>
<input type="text" placeholder="Type The Technician Email Here" name="tEmail" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Technician Address">Technician Address</label>
<input type="text" placeholder="Type The Technician Address Here" name="tAddress" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Technician Phone Number">Technician Phone Number</label>
<input type="text" placeholder="Type The Technician Phone Number Here" name="tPhno" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Reporting Day">Reporting Day</label>
<input type="date" name="tRepDay" class="form-control">
</div>

<br/>

<input type="submit" value="Submit" name="rSubmit" class="btn btn-danger">

<a href="#" onclick="window.print()" value="Print Form" class="hoverNoLine"><button class="btn btn-primary btn-block"><em class="fa fa-print"></em>&nbsp;Print Form</button></a>

<a href="adminprofile.php" class="btn btn-danger">Back To Profile</a>


<?php if(isset($msg)) {echo $msg;} ?>
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
<!----------------------End Add Technician Form------------------------------->