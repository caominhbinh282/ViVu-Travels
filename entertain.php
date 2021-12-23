<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoạt động giải trí</title>

<!--Link Icon-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" 
    integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
<!-----Link Design----->
    <link rel="stylesheet" href="./css/entertainstyle.css">
	<script src="./javascript/a.js"></script>
</head>

<body>  
    <?php require_once './header.php';?>
	
	
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
                        <h2>Kết quả tìm kiếm hoạt động giải trí "  <?php echo $_GET['findingtravel']?>  "
                        </h2>
                    </div>
                    <div class="name-select">
                        <div class="select-colum1">
                            <span>Không có cơ sở kinh doanh nào khác. Xem kết quả gần đó bên dưới:</span>  
                        </div>
                        <div class="select-colum2">
                            
                        </div>
                    </div>
                </div>
            </div>
            <br>
<!----------------------------------MapFunction---------------------------------------> 
	
<!----------------------------------Advertisement---------------------------------------> 
    
    
<!----------------------------------Entertain--------------------------------------->

	
<!----------------------------------Entertain--------------------------------------->

<!----------------------------------Entertain--------------------------------------->  
        <section class="main-entertain">
		<div class="container">
        <?php 
        $id="";
        $check="";
    $averageratestar = 0;
    $averageratestarnotodd = 0;
                $query = mysqli_query($conn, 'SELECT proviceid,provice FROM province WHERE provice LIKE "%'.$_GET['findingtravel'].'%"');


                if($row = mysqli_fetch_assoc($query)) {
                        
                     
                $id=$row['proviceid'] ;

                 ?>
                  <?php 
                  
                  $query3 = mysqli_query($conn, 'SELECT Count(*) FROM service WHERE proviceid LIKE "%'.$id.'%" AND `idtype`="h3"');
                  
                  if($row4 = mysqli_fetch_array($query3)) {
                      $check=$row4[0];
                  
                      if ($check!=0)
                      {
                          
                          echo '<div class="line"></div>';
                          echo '  <h1 class="text-center text-uppercase">Dịch vụ giải trí tại "'.$_GET['findingtravel'].'"  </h1>';
                          echo '<br>';
                          
                  }
                  
                  
                  }
                }
                  ?>
        <div class="row">
        <?php
        $id="";
        $check=""; 
        $address="";    
        $query = mysqli_query($conn, 'SELECT * FROM province WHERE provice LIKE "%'.$_GET['findingtravel'].'%"');
        while($row4 = mysqli_fetch_array($query)) {
            $id=$row4['proviceid'];
        
        ?>
            <?php 	
                if($_GET['entertain']){
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H3" AND `entertain` = "'.$_GET['entertain'].'"');
                }
                else{
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H3"');
                }
		   	    while ($row2 = mysqli_fetch_assoc($query2)) {
                    $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $row2['idservice'].'"');
                    if ($row14 = mysqli_fetch_array($query14)) {
                        $averageratestar =round($row14[0], 1);
                        $averageratestarnotodd =floor($row14[0]);
                    }
                    $query15 = mysqli_query($conn, 'SELECT provice FROM province WHERE proviceid = "'. $row2['proviceid'].'"');
                    if($row15 = mysqli_fetch_array($query15)){
                        $address = $row15['provice'];
                    }
                
		    ?>
				<div class="col-sm-4">
					<div class="place-card">
						<div class="place-card__img">
                        <a href="" class="thumb">
                            <img src="img/<?php echo $row2['avatar'] ?>" style="width: 100%;">
                        </a>
                        <a href="entertain_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?>"       class="go">
                            <h6>Chi tiết</h6>
                        </a>
						</div>
						<div class="place-card__content">
                            <div>
							    <h5 class="" style="text-align: center;"><?php  echo $row2['servicename']   ?>
                            </div>
                            <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>         
                            </div>
                            </h5>
							<div class="flex-center">
								<p class="mb-0"><i class="fa fa-map-marker" style="color: #ea4131"></i> 
                                <span class="text-add"><?php echo $address;?></span></p>
							</div>
						</div>
					</div>
				
                 

				</div>
                <div class="line"></div>
				<?php 
 	;}
                
     }
 ?>
				</div>
				</a> 

			</div>
		</div>
        </div>
	</section>


<!-- tim kiem theo tên -->
<?php 
    if($_GET['findingtravel'])
    {
?>
<div class="line"></div>
    <section class="main-entertain">
		<div class="container">
        <?php
        $id="";
        $check="";     
        $query3 = mysqli_query($conn, 'SELECT Count(*) FROM service WHERE servicename LIKE "%'.$_GET['findingtravel'].'%" AND `idtype`="h3"');
        if($row4 = mysqli_fetch_array($query3)) {
            $check=$row4[0];        
            if ($check!=0)
            {
                echo '  <h1 class="text-center text-uppercase">Dịch vụ giải trí "'.$_GET['findingtravel'].'" </h1>';
                echo '<br>';               
            }
        }
        ?>    
                  
			
    		<div class="row">
            <?php 
		    $id="";
            $idaddress="";
            $address="";
				$query = mysqli_query($conn, 'SELECT * FROM service WHERE servicename LIKE "%'.$_GET['findingtravel'].'%" AND `idtype`="h3"');
                while ($row = mysqli_fetch_assoc($query)) {                        
				$id=$row['servicename'] ;
                if($_GET['entertain']){
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `servicename` LIKE "%'.$id.'%" AND `idtype`="H3" AND `entertain` = "'.$_GET['entertain'].'"');
                }
                else{
                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `servicename` LIKE "%'.$id.'%" AND `idtype`="H3"');
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
				<div class="col-sm-4">
                <div class="place-card">
						<div class="place-card__img">
                        <a href="" class="thumb">
                            <img src="img/<?php echo $row2['avatar'] ?>" style="width: 100%;">
                        </a>
                        <a href="entertain_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?>"       class="go">
                            <h6>Chi tiết</h6>
                        </a>
						</div>
						<div class="place-card__content">
                            <div>
							    <h5 class="" style="text-align: center;"><?php  echo $row2['servicename']   ?>
                            </div>
                            <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>         
                            </div>
                            </h5>
							<div class="flex-center">
								<p class="mb-0"><i class="fa fa-map-marker" style="color: #ea4131"></i> 
                                <span class="text-add"><?php echo $address;?></span></p>
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
				</a> 

			</div>
		</div>
	</section>
<!----------------------------------menu--------------------------------------->

<section class="menu-opion">
		<ul class="list-option">
            <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&entertain="> 
            <li class="list" data-filter="all">
                    All
            </li>
            </a>
            <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&entertain=park"> 
            <li class="list" data-filter="park">   
                    Park
            </li>
            </a>
            <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&entertain=beach">
            <li class="list" data-filter="museum">    
                    Beach
            </li>
            </a>
            <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&entertain=film"> 
            <li class="list" data-filter="beach">   
                    Film
            </li>
            </a>
            <a href="?findingtravel=<?php echo $_GET['findingtravel']?>&entertain=play">
			<li class="list" data-filter="hotel">    
                    Play
            </li>
            </a>
        </ul>
	</section>
                 


<!----------------------------------Questions--------------------------------------->


   <?php require_once './footer.php';?>
</body>
</html>