<!DOCTYPE html>
<html>
    <head>
        <title></title>
        
        <link rel="stylesheet" href="./css/comment.css">
        
    </head>

    <body>

    <?php require_once 'header.php';?>
        
        <section >
            <div class="rating-box">
                <div class="rating-header">
                    <h4>Đánh giá</h4>
                    <span> 100 đánh giá</span>
                    <button class="btn cmt-btn">Viết đánh giá</button>
                </div>
                <div class="cmt-input">
                    <input type="text" placeholder="Viết đánh giá">
                    <button>
                        <span>Send</span>
                    </button>
                </div>
                <div class="rating-container">
                    <h5>Xếp hạng của khách du lịch</h5>
                    <div class="rating">
                        <ul>
                            <li>
                                <span>Tuyệt vời</span>
                                <meter value="85" min="0" max="100" title=""></meter>
                                <span>85</span> 
                            </li>
                            <li>
                                <span>Rất tốt</span>
                                <meter value="10" min="0" max="100" ></meter>
                                <span>10</span> 
                            </li>
                            <li>
                                <span>Trung bình</span>
                                <meter value="5" min="0" max="100" ></meter>
                                <span>5</span> 
                            </li>
                            <li>
                                <span>Tồi</span>
                                <meter value="0" min="0" max="100" ></meter>
                                <span>0</span> 
                            </li>
                            <li>
                                <span>Kinh khủng</span>
                                <meter value="0" min="0" max="100" ></meter>
                                <span>0</span> 
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="comment">
                <h4>Xem đánh giá</h4>
                <div class="list-cmt">
						<div class="cmt-item">
							<div class="user-info">
								<div class="user-info__img">
									<img src="./img/avatar.png" alt="User Img">
								</div>
								<div class="user-info__basic">
                                    <div class="header">    
                                        <h5 class="mb-0">Mallothi Susi</h5>
                                        <div class="rate">    
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="time-rate"> <span>Đã đánh giá 8 tháng 7 , 2022</span></div>
                                    </div>
									<p class="text-cmt">Điểm du lịch tuyệt vời nhất tôi từng đến!</p>
                                    <div class="time">
                                        <strong>Ngày đến thăm : </strong>
                                        <span> tháng 13 năm 2030</span>
                                    </div>
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
						<div class="cmt-item">
							<div class="user-info">
								<div class="user-info__img">
									<img src="./img/pic2.jpg" alt="User Img">
								</div>
								<div class="user-info__basic">
									<h5 class="mb-0">Phat Tran</h5>
									<p class="text-cmt">Các bạn nên đến một lần!</p>
                                    <div class="rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>   
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
						<div class="cmt-item">
							<div class="user-info">
								<div class="user-info__img">
									<img src="./img/pic6.jpeg" alt="User Img">
								</div>
								<div class="user-info__basic">
									<h5 class="mb-0">Thành Nguyễn</h5>
									<p class="text-cmt"></p>
                                    <div class="rate">      
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>   
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
                        <div class="load-more">
                            <span>Xem thêm bình luận khác</span>
                        </div>
                </div>
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


        <!----------------------->
    <?php require_once 'footer.php';?>
        
    
    </body>
    
</html>
