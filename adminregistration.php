<!--------------------Start PHP Code for Database Connection----------------------->
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
<!--------------------End PHP Code for Database Connection------------------------->

<!-------------------Start PHP Code for Admin Registration form-------------------->
<?php
if(isset($_REQUEST['rReg']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPass']=="")||($_REQUEST['rConPass']=="")||empty($_REQUEST['rGender'])||($_REQUEST['rAddress']=="")||empty($_REQUEST['rCity'])||empty($_REQUEST['rDOB'])||($_REQUEST['rPhno']=="")||empty($_FILES['rImage']))
{
$msg='<div class="alert alert-warning mt-3 text-center">Please Fill All The Fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPass=$_REQUEST['rPass'];
$rConPass=$_REQUEST['rConPass'];
$rGender=$_REQUEST['rGender'];
$rAddress=$_REQUEST['rAddress'];
$rCity=$_REQUEST['rCity'];
$rDOB=$_REQUEST['rDOB'];
$rPhno=$_REQUEST['rPhno'];
$rImage=$_FILES['rImage'];
$iName=$_FILES['rImage']['name'];
$i_tmp_name=$_FILES['rImage']['tmp_name'];
$ext=explode(".",$iName);
$allowed=array("jpg","jpeg","png");
if(in_array($ext[1],$allowed))
{
$un_img=uniqid().$iName;
move_uploaded_file($i_tmp_name,'images2/'.$un_img);
$sql="SELECT rEmail FROM adminregistration WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$msg='<div class="alert alert-warning mt-3 text-center">Email Already Registered</div>';
}
else
{
if($rPass==$rConPass)
{
$sql="INSERT INTO adminregistration(rName,rEmail,rPass,rConPass,rGender,rAddress,rCity,rDOB,rPhno,rImage)
VALUES('$rName','$rEmail','$rPass','$rConPass','$rGender','$rAddress','$rCity','$rDOB',
'$rPhno','$un_img')";
if(mysqli_query($conn,$sql))
{
$msg='<div class="alert alert-success mt-3 text-center">Registration Successfull</div>';
}
}
else
{
$msg='<div class="alert alert-warning mt-3 text-center">Password And Confrim Password Must Be Same</div>';
}
}
}
}
}
?>
<!-------------------End PHP Code for Admin Registration form---------------------->


<!-------------------------Start Admin Registration Form------------------------>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>AdminRegistration.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
    
<form action="" method="post" enctype="multipart/form-data" class="shadow-lg p-5">

<h5 class="text-danger">Welcome To Admin Registration Form</h5>

<br/>

<div class="form-group">
<i class="fa fa-user text-primary"></i>
<label for="Name">Name</label>
<input type="text" placeholder="Type Your Name Here" name="rName" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-envelope-square text-primary"></i>
<label for="Email">Email</label>
<input type="text" placeholder="Type Your Email Here" name="rEmail" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-key text-primary"></i>
<label for="Password">Password</label>
<input type="password" placeholder="Type Your Password Here" name="rPass" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-key text-primary"></i>
<label for="Confirm Password">Confirm Password</label>
<input type="password" placeholder="Confirm Your Password Here" name="rConPass" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-venus-mars text-primary"></i>
<label for="Gender">Gender</label>
Male<input type="radio" name="rGender" value="Male" class="form-inline">
Female<input type="radio" name="rGender" value="Female" class="form-inline">
Others<input type="radio" name="rGender" value="Others" class="form-inline">
</div>

<br/>

<div class="from-group">
<i class="fa fa-address-card text-primary"></i>
<label for="Address">Address</label>
<input type="text" placeholder="Type Your Address Here" name="rAddress" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-building text-primary" aria-hidden="true"></i>
<label for="City">City</label>
<select name="rCity">
<option value=""></option>
<option value="Chennai">Chennai</option>
<option value="Kolkata">Kolkata</option>
<option value="Mumbai">Mumbai</option>
<option value="Delhi">Delhi</option>
<option value="Durgapur">Durgapur</option>
<option value="Bangalore">Bangalore</option>
</select>
</div>

<br/>

<div class="form-group">
<i class="fa fa-birthday-cake text-primary"></i>
<label for="Date Of Birth">Date Of Birth</label>
<input type="date" name="rDOB" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-phone text-primary"></i>
<label for="Phone Number">Phone Number</label>
<input type="text" placeholder="Type Your Phone Number Here" name="rPhno" class="form-control">
</div>

<br/>

<i class="fa fa-file-image-o text-primary" aria-hidden="true"></i>
<input type="file" name="rImage" required>

<input type="submit" value="Register" name="rReg" class="btn btn-info">

<a href="adminlogin.php" class="btn btn-dark">Login</a>



</form>
<?php if(isset($msg)) {echo $msg;} ?>
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
<!-----------------------End Admin Registration From---------------------------->