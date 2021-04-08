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

<!----------Start PHP Code For Servicing Request Form------------------> 
<?php
if(isset($_REQUEST['rSubmit']))
{
if(($_REQUEST['aName']=="")||($_REQUEST['rEmail']=="")||
($_REQUEST['rAddress']=="")||($_REQUEST['rCity']=="")||
($_REQUEST['rPin']=="")||($_REQUEST['rPhno']=="")||empty($_REQUEST['rDate'])||($_REQUEST['rName']=="")||($_REQUEST['rProduct']=="")||($_REQUEST['rYears']=="")||($_REQUEST['rNotWorking']=="")||empty($_REQUEST['rNewPart'])||empty($_FILES['rImage']))
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
$rImage=$_FILES['rImage'];
$iName=$_FILES['rImage']['name'];
$i_tmp_name=$_FILES['rImage']['tmp_name'];
$ext=explode(".",$iName);
$allowed=array("jpg","jpeg","png");
if(in_array($ext[1],$allowed))
{
$un_img=uniqid().$iName;
move_uploaded_file($i_tmp_name,'images1/'.$un_img);
}
$sql="INSERT INTO servicingform(aName,rEmail,rAddress,rCity,rPin,rPhno,rDate,rName,rProduct,rYears,rNotWorking,
rNewPart,
rImage)VALUES('$aName','$rEmail','$rAddress','$rCity','$rPin','$rPhno','$rDate','$rName',
'$rProduct',
'$rYears','$rNotWorking','$rNewPart','$un_img')";
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
<!-----------------End PHP Code For Servicing Request From-------------------->
<!-----------------Start Servicing Request Form------------------>
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<title>ServicingFormRequest.com</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
<div class="row">
<div class="col-sm-12">
    
<form action="" method="post" enctype="multipart/form-data" class="shadow-lg p-5">

<h5 class="text-dark">Apply For Product Servicing Form</h5>

<br/>


<div class="form-group">
<i class="fa fa-user text-primary"></i>
<label for="Name">Name</label>
<input type="text" placeholder="Type Your Name Here" name="aName" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-envelope-square text-primary"></i>
<label for="Email">Email</label>
<input type="text" placeholder="Type Your Email Here" name="rEmail" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-address-card text-primary"></i>
<label for="Address">Address</label>
<input type="text" placeholder="Type Your Address Here" name="rAddress" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-building text-primary"></i>
<label for="City">City</label>
<input type="text" placeholder="Type Your City Here" name="rCity" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-location-arrow text-primary"></i>
<label for="PinCode">PinCode</label>
<input type="text" placeholder="Type Your Location's Pincode Here" name="rPin" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-phone text-primary"></i>
<label for="Phone Number">Phone Number</label>
<input type="text" placeholder="Type Your Phone Number Here" name="rPhno" class="form-control">
</div>

<br/>

<div class="form-group">
<label for="Date Of Submission">Date Of Submission</label>
<input type="date" name="rDate" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-product-hunt text-primary"></i>
<label for="Name Of The Product">Name Of The Product</label>
<input type="text" placeholder="Type The Name Of The Product" name="rName" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-copyright text-primary"></i>
<label for="Product Company">Product Company</label>
<input type="text" placeholder="Type Your Product's Company Name" name="rProduct" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-bicycle text-primary"></i>
<label for="No. Of Years Product Used">No. Of Years Product Used</label>
<input type="text" placeholder="Type The No. Of Years The Product Is Being Used" name="rYears" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-cogs text-primary"></i>
<label for="Parts Not Working">Parts Not Working</label>
<input type="text" placeholder="Type The Parts Which Are Not Working" name="rNotWorking" class="form-control">
</div>

<br/>

<div class="form-group">
<i class="fa fa-toolbox text-primary"></i>
<label for="Do You Want A New Part To Be Replaced With The Old Part">Do You Want A New Part To Be Replaced With The Old Part:</label>
Yes<input type="radio" name="rNewPart" value="Yes">
No<input type="radio" name="rNewPart" value="No">
</div>

<br/>

<input type="file" name="rImage" required>

<input type="submit" value="Submit" name="rSubmit" class="btn btn-danger">

<a href="#" onclick="window.print()" value="Print Form" class="hoverNoLine"><button class="btn btn-primary btn-block"><em class="fa fa-print"></em>&nbsp;Print Form</button></a>

<a href="userprofile.php" class="btn btn-warning">Back To Profile</a>



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
<!------------------End Servicing Request Form--------------------->
