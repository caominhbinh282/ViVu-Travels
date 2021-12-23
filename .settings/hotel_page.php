<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert title here</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/hotel.css">
</head>
<body>
<?php require_once 'header.php';?>

    <form id="Form" action="#" method="post">
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
                    <h2>Kết quả tìm kiếm khách sạn
                    </h2>
                </div>
                <div class="name-select">
                    <div class="select-colum1">
                        <span>Không có cơ sở kinh doanh nào khác. Xem kết quả gần đó bên dưới:</span>  
                    </div>
                    <div class="select-colum2">
                        <span class="sp1">Sắp xếp theo:</span>
                                <select name="dropdown" id="dropdown">
                                    <option value="0" selected ><span>Mặc định</span></option>
                                    <option value="1" ><span>Giá(cao đến thấp)</span></option>
                                    <option value="2"  ><span>Giá(thấp đến cao)</span></option>
                                </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="left">
                <div class="select-item">
                    <span>Giá từ:</span>
                    <div class="check">
                        <input id="rd_price" type="radio" name="rd_price" value="1" <?php if(isset($_POST['rd_price']) && $_POST['rd_price']== '1') echo "checked='checked'"; ?>>  <span>Dưới 1 triệu vnd</span><br>
                        <input id="rd_price" type="radio" name="rd_price" value="2" <?php if(isset($_POST['rd_price']) && $_POST['rd_price']== '2') echo "checked='checked'"; ?>> <span>Dưới 2 triệu vnd </span><br>
                        <input id="rd_price" type="radio" name="rd_price" value="3" <?php if(isset($_POST['rd_price']) && $_POST['rd_price']== '3'    ) echo "checked='checked'"; ?>>  <span >Dưới 3 triệu</span><br>
                        <input id="rd_price" type="radio" name="rd_price" value="0" <?php if(isset($_POST['rd_price']) && $_POST['rd_price']== '0'    ) echo "checked='checked'"; ?>>  <span >Tất cả</span><br>
                        
                    </div>
                    <div class="border"></div>
                </div>
                <div class="select-item">
                    <span>Hạng đánh giá:</span>
                    <div class="check">
                        <input id="ck_star" type="radio" name="ck_star" value="5" <?php if(isset($_POST['ck_star']) && $_POST['ck_star']== '5') echo "checked='checked'"; ?>> <span>5 <i class="fas fa-star" style="font-size: 10px;"></i></span><br>
                        <input id="ck_star" type="radio" name="ck_star" value="4" <?php if(isset($_POST['ck_star']) && $_POST['ck_star']== '4') echo "checked='checked'"; ?>> <span>4 <i class="fas fa-star" style="font-size: 10px;"></i></span><br>
                        <input id="ck_star" type="radio" name="ck_star" value="3" <?php if(isset($_POST['ck_star']) && $_POST['ck_star']== '3') echo "checked='checked'"; ?>>  <span>3 <i class="fas fa-star" style="font-size: 10px;"></i></span><br>
                        <input id="ck_star" type="radio" name="ck_star" value="2" <?php if(isset($_POST['ck_star']) && $_POST['ck_star']== '2') echo "checked='checked'"; ?>>  <span>2 <i class="fas fa-star" style="font-size: 10px;"></i></span><br>
                        <input id="ck_star" type="radio" name="ck_star" value="1" <?php if(isset($_POST['ck_star']) && $_POST['ck_star']== '1') echo "checked='checked'"; ?>> <span>1 <i class="fas fa-star" style="font-size: 10px;"></i></span><br>
                        <input id="ck_star" type="radio" name="ck_star" value="0" <?php if(isset($_POST['ck_star']) && $_POST['ck_star']== '0'    ) echo "checked='checked'"; ?>>  <span >tất cả</span><br>
                        
                    </div>
                    <div class="border"></div>
                </div>        
                <div class="select-item">
                    <span>Tiện nghi:</span>
                    <div class="check">
                        <input id="park" type="checkbox" name="cb_park"  <?php if(isset($_POST['cb_park'])) echo "checked='checked'"; ?>> <span>Bãi đậu xe</span><br>
                        <input id="pool" type="checkbox" name="cb_pool" <?php if(isset($_POST['cb_pool'])) echo "checked='checked'"; ?>> <span>Bể bơi</span><br>
                        
                    </div>
                    <div class="border"></div>
                </div> 
                
                <div class="select-item">
                    <button class="btn" type="submit" name="submit">Tìm kiếm</button>
                </div>
                
                <div class="select-item">

                    <?php
                      $park = 0;
                      $pool = 0;
                      $star = 0;
                      $price = 0;          
                      $soft = 0;
                    if(isset($_POST['dropdown'])){
                        $soft = $_POST['dropdown'];
                    }
                    if (isset($_POST['cb_park'])) {
                        $park = 1;                         //lấy giá trị checkbox là true
                    }
                    $_SESSION['park']  = $park;
                    if (isset($_POST['cb_pool'])) {
                        $pool = 1;                  
                    }
                    $_SESSION['pool']  = $pool;
                        
                    if(isset($_POST['ck_star'])){
                        $star  =  $_POST['ck_star'];
                    }
                    $_SESSION['star'] = $star;
                        
                    if (isset($_POST['rd_price'])){
                        $price = $_POST['rd_price'];
                    }
                ?>
                
                <script type="text/javascript">
                document.getElementById('dropdown').value = "<?php echo $_POST['dropdown'];?>";
                </script>

                </div>
            </div>


            <div class="right">
               
            <?php 
		    $id="";  //id tỉnh 
            $check="";   
            $averageratestar = 0;  
            $averageratestarnotodd = 0;

				  $query = mysqli_query($conn, 'SELECT proviceid FROM `province` WHERE `provice` LIKE "%'.$_GET['findingtravel'].'%"');


                 while ($row = mysqli_fetch_assoc($query)) {
                        
				$id=$row['proviceid'] ;     // lấy id tỉnh cần tìm
                    
                 ?>
            

            <?php 
            
            if($park == 1  && $pool == 1 ){  
                if($price == 1){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `pool` =1  AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `pool` =1  AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `pool` =1  AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `pool` =1  AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `pool` =1  ');   
                    }
                }
                else if($price == 2){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `pool` =1  AND `star` = 1 ');   
                    }
                    else if ($star == 2) {

                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `pool` =1  AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `pool` =1  AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `pool` =1  AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `pool` =1  AND `star` = 5 ');   
                    }
                    else{
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `pool` =1  ');   
                    }
                }
                else if($price == 3){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `pool` =1  AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `pool` =1  AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `pool` =1  AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `pool` =1  AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `pool` =1  ');   
                    }
                }
                else  {
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `park` =1  AND `pool` =1  AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"   AND `park` =1  AND `pool` =1  AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"     AND `park` =1  AND `pool` =1  AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `park` =1  AND `pool` =1  AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"   AND `park` =1  AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `park` =1  AND `pool` =1  ');   
                    }
                }
    
            }
            else if($park == 1  && $pool == 0  ){
                if($price == 1){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1    AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1    AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1   AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1   AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `park` =1  ');   
                    }
                }
                else if($price == 2){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1    AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1    AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1   AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1   AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `park` =1  ');   
                    }
                }
                else if($price == 3){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1    AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1    AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1   AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1   AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `park` =1  ');   
                    }
                }
                else {
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"     AND `park` =1    AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"     AND `park` =1    AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `park` =1   AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `park` =1   AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `park` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"   AND `park` =1  ');   
                    }
                }
            }
            else if($park == 0  && $pool == 1 ){
                if($price == 1){
                    if($star == 1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `pool` =1    AND `star` = 1 ');   
                    }
                    else if ($star == 2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `pool` =1    AND `star` =2 ');   
                    }
                    else if  ($star == 3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `pool` =1   AND `star` = 3 ');   
                    }
                    else if ($star == 4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `pool` =1   AND `star` = 4 ');   
                    }
                    else if ($star == 5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   AND `pool` =1  ');   
                    }
                }
                else if($price == 2){
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `pool` =1    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `pool` =1    AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `pool` =1   AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `pool` =1   AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   AND `pool` =1  '); 
                    }
                }
                else if($price == 3){
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `pool` =1    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `pool` =1    AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `pool` =1   AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `pool` =1   AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   AND `pool` =1  '); 
                    }
                }
                else {
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `pool` =1    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `pool` =1    AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `pool` =1   AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"   AND `pool` =1   AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `pool` =1  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"     AND `pool` =1  '); 
                    }
                };
            }
            else{
                if($price == 1){
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000      AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000     AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000     AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 1000000   '); 
                    }
                }
                else if($price == 2){
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000      AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000     AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000     AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 2000000   '); 
                    }
                }
                else if($price == 3){
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000      AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000     AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000     AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `price` < 3000000   '); 
                    }
                }
                else {
                    if($star ==1){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `star` = 1 ');   
                    }
                    else if ($star ==2) {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"   AND `star` =2 ');   
                    }
                    else if  ($star ==3){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `star` = 3 ');   
                    }
                    else if ($star ==4 ){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"    AND `star` = 4 ');   
                    }
                    else if ($star ==5){
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  AND `star` = 5 ');   
                    }
                    else {
                        $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1" '); 
                        
                        // if($soft == 1){
                        //     echo "1";
                        //     $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1" ORDER BY `price` DESC ');   
                        // }
                        // else if($soft == 2){
                        //     echo "2";
                        //     $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1" ORDER BY  `price`  ');   
                        // }
                        // else $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%'.$id.'%" AND `idtype`="H1"  ');   
                        
                    }
                }
            }
            
		   	while ($row2 = mysqli_fetch_assoc($query2)) {

                $query14 = mysqli_query($conn, 'SELECT AVG(ratestar),Count(*) FROM `rate` WHERE `idservice` = "'. $row2['idservice'].'"');
                if ($row14 = mysqli_fetch_array($query14)) {
                $averageratestar =round($row14[0], 1);  //tổng số sao đánh giá
                $averageratestarnotodd =floor($row14[0]); //làm tròn
                $countCMT = ($row14[1]);  // số cmt của 1 dịch vụ
                
                
		    ?>
                <div class="right-item">
                    <div class="item-img">
                        <img src="img/<?php echo $row2['avatar'] ?>">
                    </div>
                    <div class="item-cv">
                        <div class="cv-note">
                            <div class="name"><span><?php  echo $row2['servicename']   ?></span></div>
                            <div class="price"><span><?php  echo number_format($row2['price'])   ?></span>đ</div>
                            <div class="starHotel"><span><?php  echo  $row2['star']    ?>sao</span></div>
                            <div class="btn-price">
                                <button>
                                <a href="hotel_details.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage']?>" >Chi tiết</a>
                                </button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="item-rate">
                        <div class="icon">
                        <?php echo $averageratestarnotodd; ?>
                            <i class="fas fa-star"></i>
                            <b>   <div class="rate">
                            <?php echo $countCMT; ?>  đánh giá
                            </div></b>  
                        </div>
                        <div class="row1">
                            <i class="fas fa-wifi"></i>
                            <span>Wifi miễn phí</span>
                        </div>
                        <div class="row2">
                        <?php 
                                if($row2['pool'] == 1) echo '<i class="fas fa-swimmer"></i>
                                <span>Bể bơi</span>';
                            ?>
                        </div>
                        <div class="row3">
                            
                            <?php 
                                if($row2['park'] == 1) echo '<i class="fas fa-parking"></i>
                                <span>Bãi đỗ xe</span>';
                            ?>
                        </div>
                    </div>
    
                </div>

                <?php 
 	
    ;}

     ;}
     }
?>
                    
                </div>
                

            </div>

            
    </div>
        
    </form>
    </div>
    <?php require_once 'footer.php';?>
</body>
</html>
