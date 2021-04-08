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

<!---------------------Start Php Code for data insert----------------------->
<?php
if(isset($_REQUEST['rReg']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPass']=="")||($_REQUEST['rConPass']=="")||empty($_REQUEST['rGender'])||($_REQUEST['rAddress']=="")||empty($_REQUEST['rCity'])||empty($_REQUEST['rDate'])||($_REQUEST['rPhno']=="")||empty($_FILES['rImage']))
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
$rDate=$_REQUEST['rDate'];
$rPhno=$_REQUEST['rPhno'];
$rImage=$_FILES['rImage'];
$iName=$_FILES['rImage']['name'];
$i_tmp_name=$_FILES['rImage']['tmp_name'];
$ext=explode(".",$iName);
$allowed=array("jpg","jpeg","png");
if(in_array($ext[1],$allowed))
{
$un_img=uniqid().$iName;
move_uploaded_file($i_tmp_name,'images/'.$un_img);
$sql="SELECT rEmail FROM userregistration WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$msg='<div class="alert alert-warning mt-3 text-center">Email Already Registered</div>';
}
else
{
if($rPass==$rConPass)
{
$sql="INSERT INTO userregistration(rName,rEmail,rPass,rConPass,rGender,rAddress,rCity,rDate,rPhno,rImage)
VALUES('$rName','$rEmail','$rPass','$rConPass','$rGender','$rAddress','$rCity','$rDate',
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
<!---------------------End Php code for data insert------------------------->

<!-----------------------Start User Registration Form------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<title>Service Management System Registration From</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="post" enctype="multipart/form-data" class="shadow-lg p-5">

<h5 class="text-warning">Welcome To Service Management System User Registration Form</h5>

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

<br/>

<div class="form-group">
<i class="fa fa-venus-mars text-primary"></i>
<label for="Gender">Gender</label>
Male<input type="radio" name="rGender" value="Male" class="form-inline">
Female<input type="radio" name="rGender" value="Female" class="form-inline">
Others<input type="radio" name="rGender" value="Others" class="form-inline">

<br/>
<br/>

<div class="form-group">
<i class="fa fa-address-card text-primary"></i>
<label for="Address">Address</label>
<input type="text" placeholder="Type Your Address Here With Landmark" name="rAddress" class="form-control">
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
<input type="date" name="rDate" class="form-control">
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

<input type="submit" value="Register" name="rReg" class="btn btn-warning">

<a href="userlogin.php" class="btn btn-danger">Login</a>
<a href="index.html" class="btn btn-success">Back To Home</a>


</div>
</div>
<?php if(isset($msg)) {echo $msg;}?>
</form>

</div>
</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>
<!----------------------End User Registration Form---------------------->