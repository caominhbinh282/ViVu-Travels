<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gợi ý</title>

    <!--Link Icon-->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-----Link Design----->
    <link rel="stylesheet" href="./css/entertainstyle.css">
    <script src="./javascript/a.js"></script>
</head>

<body>
    <?php require_once './header.php'; ?>


    <span class="infor">
        <h3>Các dịch vụ du lịch tại <?php echo $_GET['myLocation'] ?></h3>
        <div class="map">
            <button type="button" class="btn-map" onclick="myFunction()">
                <i class="fas fa-map-marker-alt"></i>
                <a>&nbsp;Bản đồ</a>
            </button>
        </div>
    </span>
    <br>
    <br>

    <div class="line"></div>
    <section class="main-entertain">
        <div class="container">
            <h1 class="text-center text-uppercase">Dịch vụ giải trí</h1>
            <a class="show text-center" href="#">Xem tất cả</a><br>
            <div class="row">
                <?php
                $id = "";

                $query = mysqli_query($conn, 'SELECT proviceid,provice FROM `province` WHERE `provice` LIKE "%' . $_GET['myLocation'] . '%"');
   
                while ($row = mysqli_fetch_assoc($query)) {

                    $id = $row['proviceid'];






                ?>

                    <?php

                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%' . $id . '%" AND `idtype`="H3"');

                    while ($row2 = mysqli_fetch_assoc($query2)) {

                        $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "' . $row2['idservice'] . '"');
                        if ($row14 = mysqli_fetch_array($query14)) {
                            $averageratestar = round($row14[0], 1);

                            $averageratestarnotodd = floor($row14[0]);
                        }
                    ?>

                        <div class="col-sm-4">
                            <div class="place-card">
                                <div class="place-card__img">
                                    <a href="entertain_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage'] ?>" class="text-dark">
                                        <img src="img/<?php echo $row2['avatar'] ?>" width="400" height="270">
                                </div>
                                <div class="place-card__content">
                                    <h5 class="place-card__content_header">
                                        <?php echo $row2['servicename']   ?>
                                        <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>

                                        </div>
                                        </a>
                                    </h5>
                                    <div class="flex-center">
                                        <p class="mb-0"><i class="fa fa-map-marker"></i>
                                            <span class="text-muted"><?php echo $row['provice'] ?></span></p>
                                    </div>
                                </div>
                            </div>



                        </div>
                <?php
                    }
                }
                ?>
            </div>
            </a>

        </div>
        </div>
    </section>


    <!-- nha hang -->
    <section class="main-entertain">
        <div class="container">
            <h1 class="text-center text-uppercase">Nha hang</h1>
            <a class="show text-center" href="#">Xem tất cả</a><br>
            <div class="row">
                <?php
                $id = "";
                $check = "";
                $averageratestar = 0;
                $averageratestarnotodd = 0;

                $query = mysqli_query($conn, 'SELECT proviceid,provice FROM `province` WHERE `provice` LIKE "%' . $_GET['myLocation'] . '%"');


                while ($row = mysqli_fetch_assoc($query)) {

                    $id = $row['proviceid'];






                ?>

                    <?php

                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%' . $id . '%" AND `idtype`="H2"');

                    while ($row2 = mysqli_fetch_assoc($query2)) {

                        $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "' . $row2['idservice'] . '"');
                        if ($row14 = mysqli_fetch_array($query14)) {
                            $averageratestar = round($row14[0], 1);

                            $averageratestarnotodd = floor($row14[0]);
                        }
                    ?>

                        <div class="col-sm-4">
                            <div class="place-card">
                                <div class="place-card__img">
                                    <a href="entertain_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage'] ?>" class="text-dark">
                                        <img src="img/<?php echo $row2['avatar'] ?>" width="400" height="270">
                                </div>
                                <div class="place-card__content">
                                    <h5 class="place-card__content_header">
                                        <?php echo $row2['servicename']   ?>
                                        <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>

                                        </div>
                                        </a>
                                    </h5>
                                    <div class="flex-center">
                                        <p class="mb-0"><i class="fa fa-map-marker"></i>
                                            <span class="text-muted"><?php echo $row['provice'] ?></span></p>
                                    </div>
                                </div>
                            </div>



                        </div>
                <?php
                    }
                }
                ?>
            </div>
            </a>

        </div>
        </div>
    </section>

    <!-- khach san -->

    <section class="main-entertain">
        <div class="container">
            <h1 class="text-center text-uppercase">Khach san</h1>
            <a class="show text-center" href="#">Xem tất cả</a><br>
            <div class="row">
                <?php
                $id = "";
                $check = "";
                $averageratestar = 0;
                $averageratestarnotodd = 0;

                $query = mysqli_query($conn, 'SELECT proviceid FROM `province` WHERE `provice` LIKE "%' . $_GET['myLocation'] . '%"');


                while ($row = mysqli_fetch_assoc($query)) {

                    $id = $row['proviceid'];

                ?>

                    <?php

                    $query2 = mysqli_query($conn, 'SELECT * FROM `service` WHERE `proviceid` LIKE "%' . $id . '%" AND `idtype`="H1" ');

                    while ($row2 = mysqli_fetch_assoc($query2)) {

                        $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "' . $row2['idservice'] . '"');
                        if ($row14 = mysqli_fetch_array($query14)) {
                            $averageratestar = round($row14[0], 1);

                            $averageratestarnotodd = floor($row14[0]);
                        }
                    ?>

                        <div class="col-sm-4">
                            <div class="place-card">
                                <div class="place-card__img">
                                    <a href="entertain_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage'] ?>" class="text-dark">
                                        <img src="img/<?php echo $row2['avatar'] ?>" width="400" height="270">
                                </div>
                                <div class="place-card__content">
                                    <h5 class="place-card__content_header">
                                        <?php echo $row2['servicename']   ?>
                                        <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>

                                        </div>
                                        </a>
                                    </h5>
                                    <!-- <div class="flex-center">
                                        <span class="mb-0"><i class="fa fa-map-marker"></i>
                                            <span class="text-muted"><?php echo $row['provice'] ?></span></span>
                                    </div> -->
                                </div>
                            </div>



                        </div>
                <?php
                    }
                }
                ?>
            </div>
            </a>

        </div>
        </div>
    </section>

    <!-- du lich -->
    <section class="main-entertain">
        <div class="container">
            <h1 class="text-center text-uppercase">Du lich</h1>
            <a class="show text-center" href="#">Xem tất cả</a><br>
            <div class="row">
                <?php
                $id = "";
                $check = "";
                $averageratestar = 0;
                $averageratestarnotodd = 0;

                $query = mysqli_query($conn, 'SELECT proviceid,provice FROM province WHERE provice LIKE "%' . $_GET['myLocation'] . '%"');


                while ($row = mysqli_fetch_assoc($query)) {

                    $id = $row['proviceid'];


                ?>

                    <?php

                    $query2 = mysqli_query($conn, 'SELECT * FROM service WHERE proviceid LIKE "%' . $id . '%" AND `idtype`="h4"');

                    while ($row2 = mysqli_fetch_assoc($query2)) {

                        $query14 = mysqli_query($conn, 'SELECT AVG(ratestar) FROM `rate` WHERE `idservice` = "' . $row2['idservice'] . '"');
                        if ($row14 = mysqli_fetch_array($query14)) {
                            $averageratestar = round($row14[0], 1);

                            $averageratestarnotodd = floor($row14[0]);
                        }
                    ?>

                        <div class="col-sm-4">
                            <div class="place-card">
                                <div class="place-card__img">
                                    <a href="entertain_detail.php?id=<?php echo $row2['idservice'] ?>&idimg=<?php echo $row2['idimage'] ?>" class="text-dark">
                                        <img src="img/<?php echo $row2['avatar'] ?>" width="400" height="270">
                                </div>
                                <div class="place-card__content">
                                    <h5 class="place-card__content_header">
                                        <?php echo $row2['servicename']   ?>
                                        <div class="rate-box"> <?php echo $averageratestar; ?> <i class="fas fa-star"></i>

                                        </div>
                                        </a>
                                    </h5>
                                    <div class="flex-center">
                                        <p class="mb-0"><i class="fa fa-map-marker"></i>
                                            <span class="text-muted"><?php echo $row['provice'] ?></span></p>
                                    </div>
                                </div>
                            </div>



                        </div>
                <?php
                    }
                }
                ?>
            </div>
            </a>

        </div>
        </div>
    </section>

    <?php require_once './footer.php'; ?>
</body>

</html>