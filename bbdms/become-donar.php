<?php
error_reporting(0);
include('includes/config.php'); //DB연결
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $RRN=$_POST['RRN'];
    $mobile=$_POST['mobileno'];
    $email=$_POST['emailid'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $blodgroup=$_POST['bloodgroup'];
    $address=$_POST['address'];
    $message=$_POST['message'];
    $sql="INSERT INTO donor(Name,RRN,MobileNumber,EmailId,Age,Gender,BloodGroup,Address) VALUES(:name,:RRN,:mobile,:email,:age,:gender,:blodgroup,:address)"; // 입력된 정보 donor 테이블에 삽입
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':RRN',$RRN,PDO::PARAM_STR);
    $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':age',$age,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId) //삽입 성공시
    {
    $msg="Your info submitted successfully";
    }
    else //삽입 실패시
    {
    $error="Something went wrong. Please try again";
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

    <title>BloodBank & Donor | 헌혈자 등록</title>
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
        <h1 class="mt-4 mb-3">헌혈자 등록</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">헌혈자 등록</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><a href="reservation.php"></a><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">이름<span style="color:red">*</span></div>
<div><input type="text" name="name" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">주민등록번호<span style="color:red">*</span></div>
<div><input type="text" name="RRN" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">연락처<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">나이<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">성별<span style="color:red">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="">선택</option>
<option value="Male">남자</option>
<option value="Female">여자</option>
</select>
</div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic">혈액형<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  blood ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
<option value="<?php echo htmlentities($result->bloodtype);?>"><?php echo htmlentities($result->bloodtype);?></option>
<?php }} ?>
</select>
</div>
</div>

</div>


<div class="row">

  <div class="col-lg-4 mb-4">
  <div class="font-italic">Email Id<span style="color:red">*</span></div>
  <div><input type="email" name="emailid" class="form-control"></div>
  </div>
<div class="col-lg-4 mb-4">
<div class="font-italic">주소<span style="color:red">*</span></div>
<div><textarea class="form-control" name="address" required></textarea></div>
</div>

</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
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
