<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách nhà hàng</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/res.css">
    <link rel="stylesheet" href="./css/index2.css">
</head>
<body>
<style>
    .place-card__content:hover{
    background-color:  #00aa6c;
}

</style>
<?php require_once 'header.php';?>

    <div class="container">
        <div class="head">
            <div class="head-map">
                <div class="box-map">
                    <a href="https://www.google.com/maps/@14.1053708,108.4191312,9z">
                    <button class="btn-map">
                            <a href="https://www.google.com/maps/place/ <?php echo $_GET['findingtravel']?>"   >
                                <i class="fas fa-map-marker-alt"></i> Xem bản đồ
                            </a>
                    </button>
                    </a>
                </div>
            </div>
 
   
            
            

            <div class="head-name">
                <div class="name-txt" style=" background-color: rgb(187 227 199);">

                <?php 
		       $id="";

				  $query = mysqli_query($conn, 'SELECT proviceid,provice FROM `province` WHERE `provice` LIKE "%'.$_GET['findingtravel'].'%"');
                  $query2 = mysqli_query($conn, 'SELECT servicename FROM `service` WHERE `servicename` LIKE "%'.$_GET['findingtravel'].'%" AND `idtype`="H2"');


                 if ($row = mysqli_fetch_assoc($query2)) {
                        
				$id=$_GET['findingtravel'];
               
                 ?>

                    <h2> Kết quả tìm kiếm nhà hàng '    <?php echo $id ?>    '
                    </h2>


                    
                <?php 
                 }else if($row1 = mysqli_fetch_assoc($query)){
                    $id = $row1['provice'];
            ?>
             <h2> Các nhà hàng tại  <?php echo $id ?></h2>
             <?php
                 }else{
                 ?>
                <h2> Không tìm thấy kết quả '   <?php echo $_GET['findingtravel'] ?>    '</h2>
            <?php
                 }
                 ?>
                </div>
                <div class="name-select">
                    <div class="select-colum1" style=" background-color: rgb(187 227 199);">
                        <span>Không có cơ sở kinh doanh nào khác tại Bình Định. Xem kết quả gần đó bên dưới:</span>  
                    </div>
                    <div class="select-colum2" style=" background-color: rgb(187 227 199);">
                        
                    </div>
                </div>


            </div>
        </div>
        <div class="content1" style="display: flex;" >


            <div class="left">

            <form action="" method="post">
                <div class="select-item">
                    <span><b>Giá từ:</b></span>
                    <div class="check">
                        


                        <a style="font-size:13px;" class="btn btn-primary" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=1" >Từ 100.000đ-1000.000đ</a>
                        <a style="font-size:13px;" class="btn btn-primary" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2" >từ 1000.000đ-2000.000đ</a>
                        <a style="font-size:13px;" class="btn btn-primary" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3" >Trên 2000.000đ</a>
                        <a style="font-size:13px;" class="btn btn-primary" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=" >Tất cả</a><br>
                    
                    </div>
                    <div class="border"></div>
                </div>
            </form>
        
                <div class="select-item">
                    <span>Kiểu món:</span>
                    <div class="check">
                        
                        <a style="font-size:13px;" class="btn btn-danger" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=1">Món Việt</a>
                        <a style="font-size:13px;" class="btn btn-danger" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2">Món Á</a>
                        <a style="font-size:13px;" class="btn btn-danger" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3">Món Âu</a>
                       

                    </div>
                    <div class="border"></div>
                </div>
                <div class="select-item">
                    <span>Tiện nghi:</span>
                    <div class="check">
                        <a style="font-size:13px;" class="btn btn-warning" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2">Bãi đậu xe</a>
                        <a style="font-size:13px;" class="btn btn-warning" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3">Bể bơi</a>
                        <a style="font-size:13px;" class="btn btn-warning" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=">Đồ ăn Nhanh</a>

                    </div>
                    <div class="border"></div>
                </div> 
                <div class="select-item">
                    <span>Hạng khách sạn:</span>
                    <div class="check">

                    <i class="fas fa-star" style="font-size: 30px;"></i><a style="font-size:13px;" class="btn btn-success" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=1">5 sao</a><br>
                    <i class="fas fa-star" style="font-size: 25px;"></i><a style="font-size:13px;" class="btn btn-success" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=2">4 sao</a><br>
                    <i class="fas fa-star" style="font-size: 20px;"></i><a style="font-size:13px;" class="btn btn-success" href="?findingtravel=<?php echo $_GET['findingtravel']?>&idprice=3">3 sao</a>

                    </div>
                    <div class="border"></div>
                </div>        
            </div>









            <div class="right" style="margin: 0;">
                <div class="all-content">
    <section class="main-entertain">
		<div class="main-container" style="padding:0;">
    		<div class="row" style="margin: 0;">
            <?php 	
            $id="";
            $check="";     
            $query = mysqli_query($conn, 'SELECT proviceid,provice FROM province WHERE provice LIKE "%'.$_GET['findingtravel'].'%"');
            while ($row = mysqli_fetch_assoc($query)) {     
                $id=$row['proviceid'] ;
                if($_GET['idprice']){
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H2" AND `price` = "'.$_GET['idprice'].'"');
                }
                else{
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H2"');
                }
		   	    while ($row2 = mysqli_fetch_assoc($query2)) {
                    $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $row2['idservice'].'"');
                    if ($row14 = mysqli_fetch_array($query14)) {
                        $averageratestar =round($row14[0], 1);
                        $averageratestarnotodd =floor($row14[0]);
                }
		    ?>
				<div class="col-sm-4" style="padding: 0 5px;">
					<div class="place-card">
						<div class="place-card__img">
                            <a href="" class="thumb" style="height: 250px;">
						        <img src="img/<?php echo $row2['avatar'] ?>"   width="400" height="270">
                            </a>
                            <a class="go" href="restaurant_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?>">
                                <h6>Chi tiết</h6>
                            </a>
						</div>
						<div class="place-card__content"  style="padding: 15px;">
                            <div class="name">
                                <h6><?php  echo $row2['servicename']   ?></h6>
                            </div>
                            <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>         
                            </div>
                            <div class="price">
                                <h6>Giá từ <?php  echo $row2['prices'] ?> VNĐ</h6>
                            </div>
							<div class="flex-center">
								<p class="mb-0"><i class="fa fa-map-marker"></i> 
                                <span class="text-add"><?php echo $row['provice'] ?></span></p>
							</div>
						</div>
					</div>
				
                 

				</div>
				<?php 
 	;}
             
     }
 ?>
				</div>
                 <!--timtheten-->
                 <div>
        <?php
        $id="";
        $check="";
        if($_GET['findingtravel']){    
        $query3 = mysqli_query($conn, 'SELECT Count(*) FROM `service` WHERE servicename LIKE "%'.$_GET['findingtravel'].'%" AND `idtype`="H2"');
            if($row4 = mysqli_fetch_array($query3)) {
                $check = $row4[0];
                if ($check!=0){
                    $query4 = mysqli_query($conn, 'SELECT * FROM `service` WHERE servicename LIKE "%'.$_GET['findingtravel'].'%" AND `idtype`="H2"');
                    if($row5 = mysqli_fetch_array($query4)) {
                        $id = $row5['servicename'];
                        $query2 = mysqli_query($conn, 'SELECT Count(*) FROM `service` WHERE `servicename` LIKE "%'.$id.'%" AND `idtype`="H2"');
                        if($row6 = mysqli_fetch_array($query2)) { 
                            $check5 = $row6[0];
                            if ($check5!=0){  
                                echo '<div class="line" style="border: 1px solid   #dcdde1;"></div>'; 
                                echo '  <h5 class="text-center text-uppercase">Nhà hàng "'.$_GET['findingtravel'].'" </h5>';
                                echo '<br>';                
                            }
                        }
                    }
                }
            }
        
        ?>  
            </div>    
			
    		<div class="row">
            <?php 	
            $id="";
            $check="";
            $address="";     
            $query = mysqli_query($conn, 'SELECT * FROM `service` WHERE servicename LIKE "%'.$_GET['findingtravel'].'%" AND `idtype`="H2"');
            while ($row = mysqli_fetch_assoc($query)) {     
                $id=$row['servicename'] ;
                if($_GET['idprice']){
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `servicename` LIKE "%'.$id.'%" AND `idtype`="H2" AND `price` = "'.$_GET['idprice'].'"');
                }
                else{
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `servicename` LIKE "%'.$id.'%" AND `idtype`="H2"');
                }
		   	    while ($row2 = mysqli_fetch_assoc($query2)) {
                    $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $row2['idservice'].'"');
                    if ($row14 = mysqli_fetch_array($query14)) {
                        $averageratestar =round($row14[0], 1);
                        $averageratestarnotodd =floor($row14[0]);   
                    }
                    $query15 = mysqli_query($conn, 'SELECT provice FROM province WHERE proviceid = "'. $row2['proviceid'].'"');
                    if($row4 = mysqli_fetch_array($query15)){
                        $address = $row4['provice'];
                    }
		    ?>
				<div class="col-sm-4" style="padding: 0 5px;">
					<div class="place-card">
						<div class="place-card__img">
                            <a href="" class="thumb" style="height: 250px;">
						        <img src="img/<?php echo $row2['avatar'] ?>"   width="400" height="270">
                            </a>
                            <a class="go" href="restaurant_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?>">
                                <h6>Chi tiết</h6>
                            </a>
						</div>
						<div class="place-card__content" style="padding: 15px;">
                            <div class="name">
                                <h6><?php  echo $row2['servicename']   ?></h6>
                            </div>
                            <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>         
                            </div>
                            <div class="price">
                                <h6>Giá từ <?php  echo $row2['prices'] ?> VNĐ</h6>
                            </div>
							<div class="flex-center">
								<p class="p"><i class="fa fa-map-marker"></i> 
                                <span class="text-add"><?php echo $address ?></span></p>
							</div>
						</div>
					</div>
				
                 

				</div>
				<?php 
 	;}
                }
     }
 ?>
				</div>
   
                <!--timtheten-->
			

			</div>
		</div>
        
	</section>
    </div>



            </div>
        </div>
    </div>
    </div>
</body>
</html>
