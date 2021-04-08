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

<!----------------------Start PHP Code for Login Form--------------------->
<?php
session_start();
if(!isset($_SESSION['alogin']))
{
if(isset($_REQUEST['rLogin']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPass']==""))
{
$msg='<div class="alert alert-warning mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPass=$_REQUEST['rPass'];
$sql="SELECT rName,rEmail,rPass FROM adminregistration WHERE rName='".$rName."' AND rEmail='".$rEmail."' AND rPass='".$rPass."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$_SESSION['rName']=$rName;
$_SESSION['rEmail']=$rEmail;
$_SESSION['rPass']=$rPass;
$_SESSION['alogin']=true;
echo '<script>location.href="adminprofile.php"</script>';
}
else
{
$msg='<div class="alert alert warning mt-3 text-center">Name,Email Or Password Is Not Valid</div>';
}
}
}
}
else
{
echo '<script>location.href="adminprofile.php"</script>';
}
?>
<!----------------------End PHP Code for Login Form----------------------->

<!------------------------Start Login Form-------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>AdminLogin.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">
    
<form action="" method="POST" class="shadow-lg p-5">

<h5 class="text-dark">Welcome To Admin Login</h5>

<br/>

<i class="fa fa-user text-primary"></i>
<label for="Name">Name</label>
<input type="text" placeholder="Type Your Name Here" name="rName" class="form-control">

<br/>

<i class="fa fa-envelope-square text-primary"></i>
<label for="Email">Email</label>
<input type="text" placeholder="Type Your Email Here" name="rEmail" class="form-control">

<br/>

<i class="fa fa-key text-primary"></i>
<label for="Password">Password</label>
<input type="password" placeholder="Type Your Password Here" name="rPass" class="form-control">

<br/>

<input type="submit" value="Login" name="rLogin" class="btn btn-warning">

<a href="adminregistration.php" class="btn btn-danger">Back To Registration Page</a>
<a href="index.html" class="btn btn-success">Back To Home</a>
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
<!-------------------------End Login Form--------------------------->