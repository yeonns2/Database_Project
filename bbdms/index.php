<?php
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>혈액 관리 시스템</title>
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>

    <!-- Navigation -->
<?php include('includes/header.php');?>
<?php include('includes/slider.php');?>

    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to BloodBank</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">헌혈이란</h4>

                        <p class="card-text">
                        <p style="padding-left:2%">혈액의 성분 중 한 가지 이상이 부족하여 건강과 생명을 위협받는 다른 사람을 위해, 건강한 사람이 자유의사에 따라 아무 대가 없이 자신의 혈액을 기증하는 사랑의 실천이자, 생명을 나누는 고귀한 행동입니다. </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">헌혈 조건</h4>

                        <p class="card-text" style="padding-left:2%">
                          <ul>
                          <li>체중 남자 50kg/여자 45kg 이상</li>
                          <li>전혈헌혈 후 2개월 경과/혈소판,혈장,혈소판혈장 헌혈 후 14일이 경과한 자</li>
                          <li>외국 여행 후 1개월이 경과한 자</li>
                        </ul>
                        </p>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <h4 class="card-header">혈액의 역할</h4>

                    <p class="card-text" style="padding-left:2%">
                      <ul>
                      <li>심장박동으로 동맥. 모세혈관, 정맥순환</li>
                      <li>산소와 영양분 노폐물을 운반</li>
                      <li>백혈구와 항체 등을 통해 세균 감염 등의 질병으로부터 보호</li>

                    </ul>
                    </p>

            </div>
        </div>
      </div>

        <!-- /.row -->
        <hr>

        <!-- Portfolio Section -->
        <div class="row">

            <div class="col-lg-6">
                <h2>오늘의 혈액 보유량</h2>
                <p>
                <ul>
                  <p> </p>
                  <?php $sql = "SELECT * from  blood "; //blood의 모든 정보 검색
                  $query = $dbh -> prepare($sql);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                  foreach($results as $result)
                  {				?>
                  										<tr>

                  											<li><?php echo htmlentities($result->bloodtype);?> &nbsp; : &nbsp; <?php echo htmlentities($result->amount);?></li>

                  										</tr>
                  										<?php $cnt=$cnt+1; }} ?>


                </ul>

            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="images/blood-donor.jpg" alt="">
            </div>

        </div>

        <!-- /.row -->
        <hr>



        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
            <h4>헌혈의 필요성</h4>
                <p>
                  <li>헌혈은 수혈이 필요한 환자의 생명을 구하는 유일한 수단입니다. 혈액은 아직 인공적으로 만들 수 있거나, 대체할 물질이 존재하지 않습니다.</li>
                  <li>헌혈한 혈액은 장기간 보관이 불가능합니다.(농축적혈구 35일, 혈소판 5일) 따라서 적정 혈액보유량인 5일분을 유지하기 위해 헌혈자분들의 지속적이고 꾸준한 헌혈이 필요합니다.</li>
                  <li>우리는 언제 수혈을 받을 상황에 처할지 모릅니다. 건강할 때 헌혈하는 것은 자신과 사랑하는 가족을 위하여, 더 나아가 모두를 위한 사랑의 실천입니다.</li>
                </p>
            </div>
            <div class="col-md-4">
                <p>
                  <ul class="list-unstyled">
                    <li> &nbsp; </li>
                  </ul>
                  <p>
                <a class="btn btn-lg btn-secondary btn-block" href="become-donar.php">헌혈 예약하기</a>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
  <?php include('includes/footer.php');?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
