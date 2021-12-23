<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <style type="text/css">


  </style>
</head>
<body>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/food.css">
    <link rel="stylesheet" href="./css/comment.css">
    <link rel="stylesheet" href="./css/comment.fix.css">
    <link rel="stylesheet" href="./css/star.css">
       <link rel="stylesheet" href="./css/commentadded.css">
       <link rel="stylesheet" href="./css/zoom.css">
       <style>

</style>
<?php require_once 'header.php';?>

<?php 
   $userid = 0;
$servicename = "";
$address="";
$description="";
$open= "";
$close="";
$price="";
$idimage="";
$idservice="";
$numberrate = 0;
$averageratestar = 0;
$averageratestarnotodd = 0;
$map = "";





$query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `idservice` LIKE "%'. @$_GET['id'].'%"');
            
              if ($row = mysqli_fetch_assoc($query2)) {
                   $servicename = $row['servicename'] ;
                   $address = $row['address'] ;
                   $description = $row['description'] ;
                   $open = $row['openn'] ;
                   $close = $row['closee'] ;
                   $price = $row['price'] ;
                   $idimage = $row['idimage'] ;
                   $map = $row['map'];

              }

$query3 = mysqli_query($conn, 'SELECT * FROM `picture` WHERE `idimage` LIKE "%'. @$_GET['idimg'].'%"');
            
              if ($row = mysqli_fetch_assoc($query3)) {
                   $picture1 = $row['picture1'] ;
                   $picture2 = $row['picture2'] ;
                   $picture3 = $row['picture3'] ;
                   $picture4 = $row['picture4'] ;
    
                 

              }


$query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $_GET['id'].'"');
              if ($row14 = mysqli_fetch_array($query14)) {
$averageratestar =round($row14[0], 1);

$averageratestarnotodd =floor($row14[0]);



              }


 ?>
    <div class="container">
    <div class="header">
            <div class="row1">
                <h2> <?php echo $servicename;?> </h2>
                <div class="confirm">
                    <span><i class="fas fa-check-circle"></i></span>
                    Đã xác nhận
                </div>
                <div class="option">
                    <div class="save">
                        <i class="far fa-heart"></i>
                        <span>Lưu</span>
                    </div>
                    <div class="share">
                        <i class="far fa-share-square"></i>
                        <span>Chia sẻ</span>
                    </div>
                </div>
            </div>

            <div class="row2">
                <div class="rate">
                
                    <?php 
                               $query10 = mysqli_query($conn, 'SELECT Count(*) FROM `rate` WHERE `idservice` =  "'.@$_GET['id'].'"');
            
              if ($row10 = mysqli_fetch_array($query10)) {
                  

                $numberrate=$row10['Count(*)'];

              

              }
                     ?>
                   <b>   <?php echo $numberrate?> đánh giá</b>
                </div>
                <div class="type">
                    <span>Địa điểm du lịch hấp dẫn của Việt Nam</span>
                </div>
            </div>
            
            <div class="row3">
               
                <div>
                    <span><i class="fas fa-phone"></i> </span>
                   Thông tin liên hệ: 03213821389
                </div>
                <div class="time">
                    <span><i class="fas fa-clock"></i> </span>
                  <?php echo $open."-".$close."" ?>
                </div>

            </div>


        </div>

        <!------------------------------------>
        
        <div class="main">
            <div class="rating">
                <h3>Đánh giá </h3>
                <div class="danhgia">
                    <div class="icon">
                        <b class="rate-total"><?php echo $averageratestar; ?></b>
                  <?php 
                    if($averageratestarnotodd==4){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>




                        <?php } ?>

                     <?php 
                    if($averageratestarnotodd==5){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>




                        <?php } ?>


 <?php 
                    if($averageratestarnotodd==3){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>




                        <?php } ?>


 <?php 
                    if($averageratestarnotodd==2){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                       <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                         <i class="far fa-star"></i>




                        <?php } ?>
                         <?php 
                    if($averageratestarnotodd==1){

                   ?>  
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                       <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                         <i class="far fa-star"></i>




                        <?php } ?>


                        <b> <?php echo $numberrate ?> đánh giá</b>  
                    </div>
                    <span> <?php echo $address; ?> </span>
                    <span> Giá : <?php echo $price; ?> VND </span>
                </div>
                <div class="border"></div>
                <div class="xephang">
                    <h4>Xếp hạng</h4>
                    <div class="row">
                        <span><i class="fas fa-hamburger"></i></span>
                        &nbsp Đồ ăn
                        <span class="xyz">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                    <div class="row">
                        <span><i class="fas fa-concierge-bell"></i></span>
                        &nbsp  Dịch vụ
                        <span class="xyz">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                    <div class="row">
                        <span><i class="far fa-gem"></i></span>
                        &nbsp Giá trị
                        <span class="xyz">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="info">
                <div class="img">
                    <img src="img/<?php echo $picture1; ?>" alt="" class="img-container">
                    <div>
                        <img src="img/<?php echo $picture2; ?>" alt="" class="img-small">
                        <img src="img/<?php echo $picture3; ?>" alt="" class="img-small">
                        <img src="img/<?php echo $picture4; ?>" alt="" class="img-small">
                    </div>
                    <div class="photo-librari">
                        <span>
                            <i class="fas fa-camera"></i>
                        </span>
                        Xem tất cả các ảnh
                    </div>
                </div>
                
                <div class="xyzz">
                    <div class="detail">
                        <div>
                            <div>
                                <div>
                                    <h2>Chi tiết</h2>
                                </div>
                                <div>
                                    <div>
                                     
                                        <div> <?php echo $description; ?> </div>
                                    </div>
                                   
                                </div>
                                <div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="address">
                        <div>
                            <div>
                                <div>
                                    <h2>Địa điểm và thông tin liên hệ</h2>
                                    <span>
                                        <span class="map">
                                            <?php echo $map; ?>
                                        </span>
                                    <span>
                                            <a>
                                                <span> <?php echo $address; ?> </span>
                                                <span></span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
        
    <!--comment --> <!--comment --> <!--comment --> <!--comment -->
    <section >
            <div class="rating-box">
                <div class="rating-header">
                    <h4>Đánh giá</h4>
                    <span>  <?php echo $numberrate ?> đánh giá</span>
                    <button class="btn cmt-btn">Viết đánh giá</button>
                </div>

<!--Handle Code-->
<form action="" method="post" enctype="multipart/form-data">
                <div class="stars">
 
    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star"  value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star"  value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star"  value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star"  value="1"/>
    <label class="star star-1" for="star-1"></label>
 
</div>
                <div class="cmt-input">
                    <input type="text" placeholder="Viết đánh giá(Bắt buộc)" name="txt-rate">
                    <br>
                    <br>
                     <input type="text" placeholder="Đặt tiêu đề cho bài đánh giá của bạn(Bắt buộc)" name="txt-rate-title">
                     <br>
                    <br>
                    <h5>Bạn đi khi nào(Bắt buộc)</h5>
                
                    <input type="date" name="bday" min="2000-01-02" placeholder="Bạn đi khi nào" ><br><br>
                    <h5>Bạn đi cùng ai</h5>
               
                       
<select class="browser-default custom-select" name="gowithwho" style="width: 595px;
    height: 50px;
    border-radius:10px;">
                                    <option value="Gia đình(Trẻ nhỏ)" selected ><span>Gia đình(Trẻ nhỏ)</span></option>
                                    <option value="Cặp đôi" ><span>Cặp đôi</span></option>
                                    <option value="Gia đình(Thanh thiếu niên)"  >Gia đình(Thanh thiếu niên)<span></span></option>
                                    <option value="Bạn bè"  >Bạn bè<span></span></option>
                                    <option value="Doanh nghiệp"  >Doanh nghiệp<span></span></option>
                                    <option value="Một Mình"  >Một Mình<span></span></option>
</select>

                
<br><br>
                    <h5>Chọn ảnh bạn muốn chia sẻ</h5>
               

                     <input type="file" name="fileUpload" value="">

                    <button type="submit">
                        <span>Send</span>
                    </button>
                </div>

 

<?php 

    $checkfile = 0;



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(@$_SESSION['username']==null)
    {
         echo '<p class="star-input">đăng nhập trước khi bình luận bạn ơi<p/>';
    }



 if (empty($_POST['star'])  ){
               echo '<p class="star-input">Bạn có thể tặng tôi vài ngôi sao<p/>';
            }


if (empty(@$_POST['txt-rate-title']&&@$_POST['bday']&&@$_POST['txt-rate'] )  ){
               echo '<p class="star-input">Vui lòng điền đầy đủ thông tin<p/>';
            }



 ///IMG
    if ( isset($_FILES['fileUpload'])) {

                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["fileUpload"]["name"];
        $filetype = $_FILES["fileUpload"]["type"];
        $filesize = $_FILES["fileUpload"]["size"];
    
        // Xác minh phần mở rộng tệp
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)&&@$_FILES["fileUpload"]["name"]!=null)
        {
             echo '<p class="star-input"> Vui lòng chọn file hợp lệ!<p/>';
             $checkfile = 1;
        }



  ///IMG

if(!empty($_POST['star']) && @$_SESSION['username']!=null&&!empty($_POST['txt-rate-title']&&$_POST['bday']&&$_POST['txt-rate'] )&&$checkfile!=1){


 
   
    $query6 = mysqli_query($conn, 'SELECT * FROM `user` WHERE `email` = "'.@$_SESSION['username'].'"');
            
              if ($row6 = mysqli_fetch_assoc($query6)) {
                  
                   $userid = $row6['userid'] ;
                 

              }
             

   $lenhsql = "INSERT INTO rate VALUES ('".$userid."', '".@$_GET['id']."', '".@$_POST['txt-rate']."','".@$_POST['star']."', '".@$_POST['txt-rate-title']."', '".@$_POST['gowithwho']."', '".@$_POST['bday']."', '".@$_FILES['fileUpload']['name']."', '', '', '', '')";
    $thucthi=mysqli_query($conn,$lenhsql) or die ("Khong them duoc");
    if (!$thucthi) {
        echo " Không bình luận được !";
    }else{

      
    
       move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'img/' . $_FILES['fileUpload']['name']);
        // echo "<p>upload thành công <p><br/>";
        //echo '<p>Dường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br><p>';
        //echo '<p>Loại file: ' . $_FILES['fileUpload']['type'] . '<br><p>';
        //echo '<p>Dung lượng: ' . ((int)$_FILES['fileUpload']['size'] / 1024) . 'KB<p>';
    
       
       
      
            echo " <h3><a href='index.php'>Đánh giá của bạn đã được ghi lại.</a></h3>";

        
    }
}
///IMG
    
   


     //fix insert when f5



     
    
}
}





 ?>

<script> // fix insertdata when refresh
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>


</form>

<!--Handle Code-->





            <div class="comment">
                <h4>Xem đánh giá</h4>
                <?php 
                        $query8 = mysqli_query($conn, 'SELECT * FROM `rate` WHERE `idservice` =  "'.$_GET['id'].'"');
            
              while ($row8 = mysqli_fetch_assoc($query8)) { 

        
                  
                   $query9 = mysqli_query($conn, 'SELECT * FROM `user` WHERE `userid` =  "'.$row8['userid'].'"');
                   while ($row9 = mysqli_fetch_assoc($query9)) {
                       // code...
                   

                 ?>






                <div class="list-cmt">
                        <div class="cmt-item">
                            <div class="user-info">
                                <div class="user-info__img">
                                    <img src="./img/avatar.png" alt="User Img">
                                </div>
                                <div class="user-info__basic">
                                    <div class="header">    
                                        <h5 class="mb-0"><?php echo $row9['username'];  ?> </h5>
                                        <?php if($row8['ratestar']=="5" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                              <i class="fas fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="4" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                           <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="3" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                              <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="2" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                              <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if($row8['ratestar']=="1" ) {?>

                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                              <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                  <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                        </div>
                                    <?php } ?>
                                    

                                    </div>
                                      <h5 class="text-cmt"><?php echo $row8['title'];  ?> </h5>
                                    <p class="text-cmt"><?php echo $row8['comment'];  ?> </p>
                                    <div class="time">
                                        <strong>Ngày đến thăm : </strong>
                                        <span> <?php echo $row8['times'];  ?></span>



                                    </div>
                                    <?php 
                                            if($row8['imgshare']!=null)
                                            {

                                           

                                     ?>
                                     <p><img id="zoom" src="img/<?php echo $row8['imgshare'];  ?>" alt="Sakura" class="imgshare" style="  width: 150px;
    height: 150px;    image-rendering: pixelated;
    object-fit: contain;" /></p>
 
 <?php } ?>

                         <?php 
                                            if($row8['imgshare']==null)
                                            {

                                           

                                     ?>
                                    
 
 <?php } ?>

                                </div>
                            </div>
                            <div class="dropdown open">
                                <a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="triggerId1">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-pencil mr-1"></i>
                                        Báo cáo đánh giá
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                </div>

            <?php   }} ?>
            </div>

        </section>



        
        <script>
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const btn = $(".rating-header button")
        const input = $(".rating-box .cmt-input")
        
        btn.onclick = ()=>{
            input.style.display = "block";
        }
    </script>
        <!------------------------------------>
    <?php require_once 'footer.php';?>

</body>
</html>