<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $RRN=$_POST['RRN'];
    $donationdate= date('Y-m-d', strtotime($_POST['donationdate']));
    $sql="INSERT INTO donation(donor_id,blood_id,donationdate) SELECT '$name',BloodGroup,'$donationdate' FROM donor where '$name'=donor.Name and '$RRN'=donor.RRN";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':RRN',$RRN,PDO::PARAM_STR);
    $query->bindParam(':donationdate',$donationdate,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
    $msg="Your info submitted successfully";
    $sql="UPDATE blood SET amount=amount+1 where blood.bloodtype = (SELECT blood_id FROM donation where donor_id='$name')";
    $hy=$dbh->prepare($sql);
    $hy->execute();
    $lastInsertId = $dbh->lastInsertId();
    }
        else
    {
    $error=" 헌혈자 등록이 되어있지 않습니다.";
    }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank & Donor | 헌혈 예약하기</title>
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>


</head>

<body>

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">헌혈 예약하기</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">헌혈 예약</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic"> 이름 </div>
  <div><textarea class="form-control" name="name" required></textarea></div>
  </div>
        <div class="col-lg-4 mb-4">
        <div class="font-italic"> 주민등록번호 </div>
        <div><textarea class="form-control" name="RRN" required></textarea></div>
        </div>

<div class="col-lg-4 mb-4">
<div class="font-italic">헌혈 날짜<span style="color:red">*</span></div>
<div><input class="form-control" type="date" name="donationdate" value="<?php echo date('Y-m-d'); ?>" /></div>
</div>

</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>

</div>
</div>

        <!-- /.row -->
</form>

        <!-- /.row -->
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
