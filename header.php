<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title></title>



  <!--bootstraplongin-->
  <!--bootstraplongin-->
  <!--bootstraplongin-->

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/mdb.min.css">
  <!-- Plugin file -->
  <link rel="stylesheet" href="bootstrap/css/addons/datatables.min.css">
  <link rel="stylesheet" href="bootstrap/css/style.css">

  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/mdb.min.js"></script>
  <!-- Plugin file -->
  <script src="./js/addons/datatables.min.js"></script>

  <!--bootstraplongin-->
  <!--bootstraplongin-->
  <!--bootstraplongin-->


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/index2.css">
  <script type="text/javascript" src="../javascript/index.js"></script>
  <?php
  require 'database1.class.php';

  $config = [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'nameDB' => 'travels'
  ];
  $data = new database1($config);
  ?>
  <?php
  ob_start();
  if (isset($_POST['btn_dangnhap'])) {
    if (empty($_POST['email_login']) || empty($_POST['password_login'])) {
      echo ' <center><p style="color: red;">Thông tin chưa điền đầy đủ!</p></center>';
    } else {
      $email = @$_POST['email_login'];
      $password = @$_POST['password_login'];
      $result = $data->ManipulationDB('select * from user where email ="' . $email . '"');
      $arr = mysqli_fetch_array($result);

      if ($email == @$arr['email']) {
        if ($password == $arr['password']) {
          $_SESSION['username'] = $email;
          $_SESSION['name'] = $arr['username'];
          header('location: index.php');
        } else
          echo ' <center><p style="color: red;">Sai mat khau!</p></center>';
      } else
        echo ' <center><p style="color: red;">Tai khoang chua ton tai!</p></center>';
    }
  }
  ob_end_flush();
  ?>



</head>

<body>
  <?php require_once './Connect/Connection.php'; ?>
  <nav style =" background-color: #00aa6c;">
    <span><a href="./index.php" style="color: #fff;">VIVU .VN</a></span>



    <form action="">
      <div class="input">


      </div>
    </form>


    <ul>
      <div>
        <!-- <li>
                <i class="fas fa-pencil-alt"></i>
                <a>Xem đánh giá</a>
            </li>
            <li id="notification">
                <a>
                    <i class="far fa-bell"></i>
                    Thông báo
                </a>
            </li> -->
      </div>





      <?php
      if (isset($_SESSION['username'])) {
        $_SESSION['username'] . "<br/>";
       ?>
            <li>
            <i class="fas fa-user"></i>
            <a>
              <?php echo $_SESSION['name'] ; ?>
            </a>
        </li>
        <?php
        ?>
        <li>
        <i class="fas fa-sign-out-alt"></i>
        <a>
          <?php echo '<a href="logout.php" style="color: black;">Logout</a> '; ?>
        </a>
      </li>
    <?php
       // echo '<a href="logout.php">Logout</a>';
      } else {

        echo '<a href="" class="login" data-toggle="modal" data-target="#modalLRForm">Đăng Nhập</a>';
      }
      ?>
      </a>

    </ul>

  </nav>
  <!----------------------->

  <div class="content">
    <div class="menu">
      <ul style="">
        <li class="menu-item ">
          <a href="index.php">
            <span><i class="fas fa-comment-alt"></i></span>
            <span class="text">Trang chủ</span>
          </a>
        </li>
        <li class="menu-item ">
          <a data-toggle="modal" data-target="#myModal1">
            <span><i class="fas fa-plane-departure"></i></span>
            <span class="text"> Du lịch</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="hotel_page.php" data-toggle="modal" data-target="#myModal2">
            <span><i class="fas fa-hotel"></i></span>
            <span class="text">Khách sạn</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="res_page.php" data-toggle="modal" data-target="#myModal3">
            <span><i class="fas fa-glass-martini"> </i></span>
            <span class="text">Nhà hàng</span>
          </a>
        </li>
        <li class="menu-item">
          <a href="entertain.php" data-toggle="modal" data-target="#myModal4">
            <span><i class="fas fa-gopuram"></i></span>
            <span class="text">Hoạt động giải trí</span>
          </a>
        </li>
      </ul>
    </div>
  </div>


  <!--------------------------------------------->

  <!--------------------------------------------->

  <div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
      <div class="modal-dialog">
        <form action="travel.php" method="get">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title ">Du lịch</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="input">
                <input type="text" placeholder="Nhập địa điểm ..." name="findingtravel">
                <span>

                </span>
              </div>

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">
                Tìm kiếm
              </button>

            </div>
          </div>


        </form>




      </div>
    </div>

  </div>
  <!--------------------------------------------->
  <!--------------------------------------------->

  <div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal2" role="dialog">
      <div class="modal-dialog">
        <form action="hotel_page.php" method="get">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Khách sạn</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
              <div class="input">
                <input type="text" placeholder="Nhập địa điểm ..." name="findingtravel">
                <span>

                </span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Tìm kiếm</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!--------------------------------------------->
  <!--------------------------------------------->

  <div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal3" role="dialog">
      <div class="modal-dialog">
        <form action="res_page.php" method="get">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nhà hàng</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
              <div class="input">
                <input type="text" placeholder="Nhập địa điểm ..." name="findingtravel">
                <span>

                </span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default" name="idprice">Tìm kiếm</button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </div>
  <!--------------------------------------------->
  <!--------------------------------------------->
  <div class="container">

    <!-- Modal -->
    <div class="modal fade" id="myModal4" role="dialog">
      <div class="modal-dialog">
        <form action="entertain.php" method="get">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hoạt động giải trí</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <div class="input">
                <input type="text" placeholder="Nhập địa điểm ..." name="findingtravel">
                <span>

                </span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default" name="entertain">Tìm kiếm</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
  <!--------------------------------------------->


  <!--Modal: Login / Register Form-->
  <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                Đăng kí</a>
            </li>
          </ul>

          <!-- Tab panels -->
          <div class="tab-content">
            <!--Panel 7-->
            <div class="tab-pane fade in show active" id="panel7" role="tabpanel">



              <form action="" method="POST">

                <!--Body-->
                <div class="modal-body mb-1">
                  <div class="md-form form-sm mb-5">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="email" id="modalLRInput10" class="form-control form-control-sm validate" name="email_login">
                    <label style="margin-top: 5px;" data-error="Không hợp lệ" data-success="Hợp lệ" for="modalLRInput10">Email</label>
                  </div>

                  <div class="md-form form-sm mb-4">
                    <i class="fas fa-lock prefix"></i>
                    <input type="password" id="modalLRInput11" class="form-control form-control-sm validate" name="password_login">
                    <label style="margin-top: 5px;" data-error="Không hợp lệ" data-success="Hợp lệ" for="modalLRInput11">Mật khẩu</label>
                  </div>
                  <div class="text-center mt-2">
                    <button class="btn btn-info" type="submit" name="btn_dangnhap" onclick="tai_lai_trang()">Đăng nhập <i class="fas fa-sign-in ml-1"></i></button>

                  </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">

                  <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
                </div>
              </form>
            </div>
            <!--/.Panel 7-->

            <!--Panel 8-->


            <div class="tab-pane fade" id="panel8" role="tabpanel">
              <form action="#" method="POST">
                <?php
                require 'database.class.php';

                $config = [
                  'host' => 'localhost',
                  'user' => 'root',
                  'pass' => '',
                  'nameDB' => 'travels'
                ];
                $data = new database($config);
                ?>
                <?php
                if (isset($_POST['btn_dangky'])) {
                  if (empty($_POST['txtemail']) || empty($_POST['txtusername']) || empty($_POST['txtpassword']) || empty($_POST['txtconfirmoassword'])) {
                    echo ' <center><p style="color: red;">Thông tin chưa điền đầy đủ!</p></center>';
                  } else {
                    $email = @$_POST['txtemail'];
                    $username = @$_POST['txtusername'];
                    $password = @$_POST['txtpassword'];
                    $length_pass = strlen($password);
                    $confirmoassword = @$_POST['txtconfirmoassword'];

                    $check = $data->check("select * from user where email ='" . $email . "' ");

                    if ($check == true) {
                      if ($length_pass >= 3 && $length_pass <= 12) {

                        if ($password != $confirmoassword) {
                          echo ' <center><p style="color: red;">Mật khẩu không khớp!</p></center>';
                        } else {
                          $insert = $data->ManipulationDB("INSERT INTO user(email,username,password) VALUES ('$email','$username','$password')");
                          echo ' <center><p style="color: red;">Đăng ký thành công!</p></center>';
                        }
                      } else
                        echo ' <center><p style="color: red;">Độ dài mật khẩu không hợp lệ!</p></center>';
                    } else {
                      echo ' <center><p style="color: red;">Tài khoản đã tồn tại!</p></center>';
                    }
                  }
                } else {
                  echo ' <center><p style="color: blue;">Xin mời nhập thông tin</p></center>';
                }
                ?>
                <!--Body-->
                <div class="modal-body">
                  <div class="md-form form-sm mb-5">
                    <i class="fas fa-envelope prefix"></i>
                    <input type="email" id="modalLRInput12" class="form-control form-control-sm validate" name="txtemail">
                    <label data-error="Không hợp lệ" data-success="Hợp lệ" for="modalLRInput12">Nhập email</label>
                  </div>

                  <div class="md-form form-sm mb-5">
                    <i class="fas fa-lock prefix"></i>
                    <input type="text" id="modalLRInput13" class="form-control form-control-sm validate" name="txtusername">
                    <label data-error="Không hợp lệ" data-success="Hợp lệ" for="modalLRInput13">Username</label>
                  </div>

                  <div class="md-form form-sm mb-5">
                    <i class="fas fa-lock prefix"></i>
                    <input type="password" id="modalLRInput13" class="form-control form-control-sm validate" name="txtpassword">
                    <label data-error="Không hợp lệ" data-success="Hợp lệ" for="modalLRInput13">Nhập mật khẩu</label>
                  </div>

                  <div class="md-form form-sm mb-4">
                    <i class="fas fa-lock prefix"></i>
                    <input type="password" id="modalLRInput14" class="form-control form-control-sm validate" name="txtconfirmoassword">
                    <label data-error="Không hợp lệ" data-success="Hợp lệ" for="modalLRInput14">Nhập lại mật khẩu</label>
                  </div>

                  <div class="text-center form-sm mt-2">
                    <button class="btn btn-info text-white" name="btn_dangky" type="submit">Đăng kí <i class="fas fa-sign-in ml-1"></i></button>
                  </div>

                </div>
                <!--Footer-->
                <div class="modal-footer">

                  <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Đóng</button>
                </div>
              </form>
            </div>
            <!--/.Panel 8-->
          </div>

        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login / Register Form-->


</body>

</html>
