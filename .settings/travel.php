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
        <link rel="stylesheet" href="css/travels.css">
    <script src="./javascript/a.js"></script>
</head>

<body>  
    <?php require_once './header.php';?>
        <?php require_once './header.php';?>

    <span class="infor">
        <h3>Kết quả bạn tìm <?php echo $_GET['findingtravel'] ?> </h3>
        <div class="map">
            <button type="button" class="btn-map" onclick="myFunction()">
                <i class="fas fa-map-marker-alt"></i>
                <a>&nbsp;Bản đồ</a>
            </button>
        </div>     
    </span>
    <br>
    <br>
<!----------------------------------MapFunction---------------------------------------> 
    
<!----------------------------------Advertisement---------------------------------------> 
    
   

<!----------------------------------Entertain 2--------------------------------------->


                
<?php 
        $id="";
        $check="";
    $averageratestar = 0;
    $averageratestarnotodd = 0;









                  $query = mysqli_query($conn, 'SELECT proviceid,provice FROM province WHERE provice LIKE "%'.$_GET['findingtravel'].'%"');


                 while ($row = mysqli_fetch_assoc($query)) {
                        
                     
                $id=$row['proviceid'] ;

                 ?>
                 
                  </div>
                  <?php 
                  
                  $query3 = mysqli_query($conn, 'SELECT Count(*) FROM service WHERE proviceid LIKE "%'.$id.'%" AND `idtype`="h4"');
                  
                  while ($row4 = mysqli_fetch_array($query3)) {
                      $check=$row4[0];
                  
                      if ($check!=0)
                      {
                          echo '<br>';     
                          echo '  <div class="line"></div>';
                          echo '<br>';
                          echo '  <h1 class="text-center text-uppercase">Các điểm du lịch hàng đầu tại  '.$row['provice'].'  </h1>';
                          echo '<br>';
                          
                  }
                  
                  
                  }
                  ?>
                  
				 <div class="row2" style="float: left">
				
                  <?php 

           $query2 = mysqli_query($conn, 'SELECT * FROM service WHERE proviceid LIKE "%'.$id.'%" AND `idtype`="h4"');
            
              while ($row2 = mysqli_fetch_assoc($query2)) {

            
                        $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "'. $row2['idservice'].'"');
              if ($row14 = mysqli_fetch_array($query14)) {
$averageratestar =round($row14[0], 1);

$averageratestarnotodd =floor($row14[0]);


              


            ?>

            
 
      
          
         
           
                <!-- next-->
                <div class="col-sm-4 hotel">
                <a href="travel_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?> " class="place-card">
                        <div class="place-card__img">
                            <img src="img/<?php echo $row2['avatar'] ?>" class="place-card__img-thumbnail" alt="Thumbnail">
                        </div>
                        <div class="place-card__content">
                            <h5 class="place-card__content_header">
                            <a href="travel_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?> " class="text-dark"> <?php echo  $row2['servicename']  ?></a> 
                            <div class="rating-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>
                                   
                                </div>
                            <a href="travel_detail.php"><i class="fa fa-heart-o"></i></a></h5>
                            <div class="flex-center">
                                <p class="mb-0"><i class="fa fa-map-marker"></i> 
                                <span class="text-muted"><?php  echo    $row2['address'] ?></span></p>
                                
                            </div>
                        </div>
                    </a>
     </div>
   <!-- next-->
               
<?php }
    
  ?>
                

      
  
  <?php 
  ;} 
 echo '</div> ';
     }
 ?>  

 
<!----------------------------------menu--------------------------------------->



<!----------------------------------Questions--------------------------------------->

   <div class="line"> </div>
   <br>
   <div class="question">
        <h3>Câu hỏi thường gặp về quy nhơn</h3>
        <a>Những điểm du lịch hàng đầu tại quy nhơn?</a>
        <br>
        <a>Những hoạt động ngoài trời thú vị?</a>
        <br>
        <a>Những hoạt động phổ biến dành cho cha mẹ cùng trẻ nhỏ là gì?</a>
   </div>        `


   <?php require_once './footer.php';?>
</body>
</html>