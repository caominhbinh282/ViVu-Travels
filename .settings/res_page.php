<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/res.css">
    <link rel="stylesheet" href="./css/res.fix.css">
</head>
<body>
<?php require_once 'header.php';?>

    <div class="container">
        <div class="head">
            <div class="head-map">
                <div class="box-map">
                    <a href="https://www.google.com/maps/@14.1053708,108.4191312,9z">
                    <button class="btn-map">
                        <i class="fas fa-map-marker-alt"></i> Xem bản đồ
                    </button>
                    </a>
                </div>
            </div>
 
   
            
            

            <div class="head-name">
                <div class="name-txt">

                <?php 
		       $id="";

				  $query = mysqli_query($conn, 'SELECT proviceid,provice FROM `province` WHERE `provice` LIKE "%'.$_GET['findingtravel'].'%"');


                 if ($row = mysqli_fetch_assoc($query)) {
                        
				$id=$row['proviceid'] ;
               
                 ?>

                    <h2>Nhà hàng  <?php echo $row['provice'] ?>
                    </h2>


                    
         <?php 
 	;}
 ?>
                </div>
                <div class="name-select">
                    <div class="select-colum1">
                        <span>Không có cơ sở kinh doanh nào khác tại Bình Định. Xem kết quả gần đó bên dưới:</span>  
                    </div>
                    <div class="select-colum2">
                        
                    </div>
                </div>


            </div>
        </div>
        <div class="content">


            <div class="left">

            <form action="" method="post">
                <div class="select-item">
                    <span><b>Giá từ:</b></span>
                    <div class="check">
                        


                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=1" ><span>Dưới 1.000.000đ</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2" ><span>Dưới 2.000.000đ</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3" ><span>Dưới 3.000.000đ</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=" ><span>Tất cả</span></a><br>
                    
                    </div>
                    <div class="border"></div>
                </div>
            </form>
        
                <div class="select-item">
                    <span>Kiểu món:</span>
                    <div class="check">
                        
                      <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=1"><span>Món Việt</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2"><span>Món Á</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3"><span>Món Âu</span></a><br>
                       

                    </div>
                    <div class="border"></div>
                </div>
                <div class="select-item">
                    <span>Tiện nghi:</span>
                    <div class="check">
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2"><span>Bãi đậu xe</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3"><span>Bể bơi</span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice="><span>Đồ ăn Nhanh</span></a><br>

                    </div>
                    <div class="border"></div>
                </div> 
                <div class="select-item">
                    <span>Hạng khách sạn:</span>
                    <div class="check">

                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=1"><span>5 <i class="fas fa-star" style="font-size: 10px;"></i></span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2"><span>4 <i class="fas fa-star" style="font-size: 10px;"></i></span></a><br>
                        <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3"><span>3 <i class="fas fa-star" style="font-size: 10px;"></i></span></a><br>

                    </div>
                    <div class="border"></div>
                </div>        
            </div>









            <div class="right">
                <div class="right-item row">
                 
                






                    <ul >
                        
                        
                <?php 
		$id="";
        $check="";
        $averageratestar = 0;
        $averageratestarnotodd = 0;

				  $query = mysqli_query($conn, 'SELECT proviceid,provice FROM `province` WHERE `provice` LIKE "%'.$_GET['findingtravel'].'%"');


                 while ($row = mysqli_fetch_assoc($query)) {
                        
				$id=$row['proviceid'] 
                     ?>



<?php 


if($_GET['idprice']){
    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H2" AND `price`= "'.$_GET['idprice'].'"');
}
else{
    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H2"');
}
if($_GET['idprice']){
    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H2" AND `price`= "'.$_GET['idprice'].'"');
}
 
   while ($row2 = mysqli_fetch_assoc($query2)) {

 
             $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $row2['idservice'].'"');
   if ($row14 = mysqli_fetch_array($query14)) {
$averageratestar =round($row14[0], 1);

$averageratestarnotodd =floor($row14[0]);

 ?>






                        <li class="slide-item " >
                            <div class="img">
                            <img src="img/<?php echo $row2['avatar'] ?>">
                            </div>
                            <div class="row1">
                                <span><?php  echo $row2['servicename']   ?></span>
                            </div>
                            <div class="row1">

                            <i class="cv-rate" style="font-size: 20px;"><span> <?php echo $averageratestar; ?> /5<i class="fas fa-star" style="font-size: 15px;"></i></span></i>
                                <b> Giá  <?php  echo $row2['prices'] ?> VNĐ</b>  
                            </div>
                            <div class="row3">
                                <span><?php  echo $row2['typefood']   ?></span>
                            </div>
                            <div class="row4">
                                <a href="restaurant_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?>" ><button>Chi tiết</button></a>
                            </div>
                            
                        </li>
                                    

                    
                        <?php 
 	;}
  
     }
 ?>           
   
                        
                        <?php 
 	
  
     }
 ?>           
                           </ul>








                    
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'footer.php';?>
</body>
</html>