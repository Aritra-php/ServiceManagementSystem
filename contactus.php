<!--------------------Start Database Connection--------------------------->
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
<!--------------------End Database Connection------------------------------>

<!-------------------Start PHP Code For data insert-------------------->
<?php
if(isset($_REQUEST['rSubmit']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rMessage']==""))
{
$msg='<div class="alert alert-warning mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rMessage=$_REQUEST['rMessage'];
$sql="SELECT rEmail FROM contactus WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
$msg='<div class="alert alert-warning mt-3 text-center">Message Already Registered With This Email</div>';
else
{
$sql="INSERT INTO contactus(rName,rEmail,rMessage)VALUES('$rName','$rEmail','$rMessage')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-3 text-center">Message Recorded Successfully</div>';
}
else
{
$msg='<div class="alert alert-warning mt-3 text-center">Unable To Record Message</div>';
}
}
}
}
?>
<!-------------------End PHP Code For data insert---------------------->

<!----------------------Start HTML Form----------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>Contactus.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.form-control1
{
height:125px;
width: 575px;
}
    
</style>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="post" class="shadow-lg p-5">

<div class="form-group">
<i class="fa fa-user text-success" aria-hidden="true"></i>
<label for="Name">Name</label>
<input type="text" placeholder="Type Your Name Here" name="rName" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-envelope-o text-success" aria-hidden="true"></i>
<label for="Email">Email</label>
<input type="text" placeholder="Type Your Email Here" name="rEmail" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-commenting-o text-success" aria-hidden="true"></i>
<label for="Your Message">Your Message</label>
<input type="text" placeholder="Type Your Message Here" name="rMessage" class="form-control1">
</div>

<br/>

<input type="submit" value="submit" name="rSubmit" class="btn btn-success">
<a href="index.html" class="btn btn-warning">Back To Home</a>
<?php if(isset($msg)) {echo $msg;}?>
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
<!-----------------------End HTML Form--------------------------->