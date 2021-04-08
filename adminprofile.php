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

<!------------------------Start PHP Code-------------------------------->
<?php
session_start();
if(isset($_SESSION['alogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="adminlogin.php"</script>';
}
$sql="SELECT *FROM adminregistration WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rEmail=$row['rEmail'];
$rAddress=$row['rAddress'];
$rCity=$row['rCity'];
$rDOB=$row['rDOB'];
$rPhno=$row['rPhno'];
$rImage=$row['rImage'];
?>
<!------------------------End PHP Code----------------------------------> 

<!-----------------------Start Profile Form------------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>AdminProfile.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
if(isset($_SESSION['alogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="adminlogin.php"</script>';
}
$sql="SELECT *FROM adminregistration WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rEmail=$row['rEmail'];
$rAddress=$row['rAddress'];
$rCity=$row['rCity'];
$rDOB=$row['rDOB'];
$rPhno=$row['rPhno'];
$rImage=$row['rImage'];
?>

<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="post" class="shadow-lg p-5">

<h5 class="text-info">Welcome To Your Profile Admin</h5>

<br/>

<i class="fa fa-user text-primary"></i>
<label for="Name">Name</label>
<input type="text" name="rName" class="form-control"
value="<?php echo $rName; ?>">

<br/>

<i class="fa fa-envelope-square text-primary"></i>
<label for="Email">Email</label>
<input type="text" name="rEmail" class="form-control"
value="<?php if(isset($rEmail)) {echo $rEmail;}?>">

<br/>

<i class="fa fa-address-card text-primary"></i>
<label for="Address">Address</label>
<input type="text" name="rAddress" class="form-control"
value="<?php echo $rAddress; ?>">

<br/>

<i class="fa fa-building text-primary" aria-hidden="true"></i>
<label for="City">City</label>
<input type="text" name="rCity" class="form-control"
value="<?php echo $rCity;?>">

<br/>

<i class="fa fa-birthday-cake text-primary"></i>
<label for="DOB">DOB</label>
<input type="text" name="rDOB" class="form-control"
value="<?php echo $rDOB;?>">

<br/>

<i class="fa fa-phone text-primary"></i>
<label for="Phone Number">Phone Number</label>
<input type="text" name="rPhno" class="form-control"
value="<?php echo $rPhno;?>">

<br/>

<img src="<?php if(isset($rImage)) {echo "images2/".$row['rImage'];}?>" style="border-radius:150px; height:100px; width:100px;">
<br/>
<br/>

<input type="submit" value="Update" name="rUpdate" class="btn btn-warning">
<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];}?>">

<a href="adminlogout.php" class="btn btn-danger">Logout</a>
<a href="adminchangepass.php" class="btn btn-dark">Change Password</a>
<a href="servicingrequest.php" class="btn btn-warning">Check For Servicing Request</a>
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
<!--------------------------End Profile Form---------------------------------->

<!-------------------------Start PHP Code for Update Button-------------->
<?php
if(isset($_REQUEST['rUpdate']))
{
if(($_REQUEST['rEmail']=="")||($_REQUEST['rAddress']=="")||($_REQUEST['rPhno']==""))
{
echo'<div class="alert alert-warning mt-3 text-center">Please Fill The Required Fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rEmail=$_REQUEST['rEmail'];
$rAddress=$_REQUEST['rAddress'];
$rPhno=$_REQUEST['rPhno'];
$sql="UPDATE adminregistration SET rEmail='".$rEmail."',rAddress='".$rAddress."',rPhno='".$rPhno."' WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo'<div class="alert alert-success mt-3 text-center">Data Updated Successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Data Unable To Update</div>';
}
}
}
?>
<!-------------------------End PHP Code for Update Button---------------->