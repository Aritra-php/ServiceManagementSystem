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
<!--------------------Start PHP Code------------------------->
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
$sql="SELECT *FROM userregistration WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rEmail=$row['rEmail'];
$rAddress=$row['rAddress'];
$rCity=$row['rCity'];
$rDate=$row['rDate'];
$rPhno=$row['rPhno'];
$rImage=$row['rImage'];
?>
<!--------------------End PHP Code--------------------------->

<!-------------------Start User Profile Form----------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<title>UserProfile.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="userlogin.php"</script>';
}
$sql="SELECT *FROM userregistration WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rName=$row['rName'];
$rEmail=$row['rEmail'];
$rAddress=$row['rAddress'];
$rCity=$row['rCity'];
$rDate=$row['rDate'];
$rPhno=$row['rPhno'];
$rImage=$row['rImage'];
?>

<div class="container">
<div class="row">
<div class="col-sm-12">
    
<form action="" method="POST" class="shadow-lg p-5">

<h5 class="text-danger">Welcome To Your Profile</h5>

<br/>


<i class="fa fa-user text-primary"></i>
<label for="Name">Name</label>
<input type="text" name="rName" class="form-control"
value="<?php echo $rName;?>">

<br/>

<i class="fa fa-envelope-square text-primary"></i>
<label for="Email">Email</label>
<input type="text" name="rEmail" class="form-control"
value="<?php if(isset($rEmail)) {echo $rEmail;}?>">

<br/>

<i class="fa fa-address-card text-primary"></i>
<label for="Address">Address</label>
<input type="text" name="rAddress" class="form-control"
value="<?php echo $rAddress;?>">

<br/>

<i class="fa fa-building text-primary" aria-hidden="true"></i>
<label for="City">City</label>
<input type="text" name="rCity" class="form-control"
value="<?php echo $rCity;?>">

<br/>

<i class="fa fa-birthday-cake text-primary"></i>
<label for="Date Of Birth">Date Of Birth</label>
<input type="text" name="rDate" class="form-control"
value="<?php echo $rDate;?>">

<br/>

<i class="fa fa-phone text-primary"></i>
<label for="Phone Number">Phone Number</label>
<input type="text" name="rPhno" class="form-control"
value="<?php echo $rPhno;?>">

<br/>

<img src="<?php if(isset($rImage)) {echo "images/".$row['rImage'];}?>" style="border-radius:150px; height:100px; width:100px;">

<br/>
<br/>

<input type="submit" value="Update" name="Update" class="btn btn-success">
<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];}?>">

<a href="userlogout.php" class="btn btn-danger">Logout</a>
<a href="userchangepass.php" class="btn btn-info">ChangePassword</a>
<a href="servicingformrequest.php" class="btn btn-dark">ApplyForServicing</a>
<a href="checkstatus.php" class="btn btn-warning">Check Your Servicing Status</a>

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
<!-------------------------End User Profile Form--------------------->

<!-------------------start php code for update button---------------->
<?php
if(isset($_REQUEST['Update']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rAddress']=="")||($_REQUEST['rPhno']==""))
{
echo '<div class="alert alert-warning mt-3 text-center>Please fill all the fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rAddress=$_REQUEST['rAddress'];
$rPhno=$_REQUEST['rPhno'];
$sql="UPDATE userregistration SET rName='$rName',rEmail='$rEmail',rAddress='$rAddress',rPhno='$rPhno' WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Data Updated successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Unable To Update Data</div>';
}
}
}
?>
<!-------------------End php code for update button---------------->

