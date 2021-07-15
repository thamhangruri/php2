<!doctype html>
<div lang="en">
    <head>
        <title> Ruri - Uy Tín là Sức Mạnh </title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
              crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/bc2f081eaf.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?= ROOT_URL ?>/site/css/style.css">
        <script type="text/javascript" src="js/hoamai-hoadao.js"></script>
    </head>
    <body>
    <div class="container-fluid p-0 m-0">
        <header>

            <div class="container-fluid p-0 m-0"> <!-- Top Nav -->
                <div class="navbar navbar-expand-lg top-nav">

                    <div class="logo" style="top:16%;left: 13%;position: absolute">
                        <img src="<?= ROOT_URL ?>/site/Images/logo.png" style="width: 65px">
                    </div>
                    <div class="justify-content-center" style="top:16%;left: 33%;position: absolute">
                        <form method="get">
                            <div class="input-group mb-3">
                                <input type="hidden" name="ctrl" value="search">
                                <input type="search" class="form-control border-0" style="width: 400px;" name="search"
                                       placeholder="Nhập tên điện thoại,..." aria-label="Nhập tên điện thoại"
                                       aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark bg-black" name="btn-search" type="submit" id="button-addon2"><i
                                                class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="justify-content-end" style="right: 10%;position: absolute;">
                        <?php
                            if(isset($_SESSION['user'])){
                                echo '
                                <div class="dropdown">
                                  <a class="dropdown-toggle text-white" style="text-decoration: none" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="index.php?ctrl=customer&action=info">
                                    Xin chào '.$_SESSION['user']['name'].'
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="dropdown-item" href="?ctrl=home&act=xemdonhang">Xem đơn hàng</a>
                                    <a class="dropdown-item" href="?ctrl=login&act=changepass">Đổi mật khẩu</a>
                                    <a class="dropdown-item" href="?ctrl=login&act=logout">Đăng xuất</a>
                                  </div>
                                </div>
                                ';
                            }
                            else{
                               echo' <a class="navbar-brand text-white " href="'.ROOT_URL.'/dang-nhap/"> Đăng Nhập</a>
                                    <a class="navbar-brand text-white " href="'.ROOT_URL.'/dang-ky/"> Đăng Ký</a>';
                            }?>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg text-uppercase nav-chinh" style="background-color: black">
                <div class="container">
                    <a class="nav-link" href="<?= ROOT_URL ?>/trang-chu/"> Trang chủ </a>
                    <a class="nav-link" href="<?= ROOT_URL ?>/dien-thoai/"> Điện thoại </a>
                    <a class="nav-link" href="<?= ROOT_URL ?>/hang/"> Hãng </a>
                    <a class="nav-link" href="#"> Khuyến Mãi </a>
                    <a class="nav-link" href="#"> Tin tức </a>
                    <a class="nav-link" href="<?= ROOT_URL ?>/gio-hang/"> <i class="fas fa-shopping-cart"
                                                                           style="font-size:15pt"></i>(<?php echo $_SESSION['infor']['count'] ?>)
                        </a>
                        </nav>
        </header>
    </div>
    <main class="wrapper-main fix">
        <?php if (file_exists($viewFile)) require_once "$viewFile"; ?>
    </main>
    <footer style="width: 100%;min-height: 200px;background-color: #9c3328">
        <div class="row">
            <div class="col-sm-6">
                <ul style="list-style: none">
                    <p>
                        <span style="font-size: 18px;color:white;" >CHẤT LƯỢNG </span>
                    </p>
                    <p style="color:white;">
                        Shop đảm bảo chất lượng cho tất cả sản phẩm bán tại Store bằng <br> chính sách bảo hành vĩnh viễn.
                        </br>
                    </p>
                    <p style="color:white;">
                        <span style="font-size: 18px;">PHỤC VỤ  </span>
                    </p>
                    <p style="color:white;">

                        Shop cam kết chất lượng phục vụ tốt nhất, chuyên nghiệp nhất cho mọi khách hàng bằng <br> chính sách hoàn tiền và tặng quà nếu nhân viên phục vụ quí khách không chu đáo.

                    </p>

                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="footer-hai">
                    <p style="color:white; font-size:14pt;">

                        Đặt hàng và thu tiền tận nơi toàn quốc </p>
                    <p><i class="fa fa-phone-square" before> </i> 1900633349</p>
                    <p style="color:white;font-size: 20px;"> THÔNG TIN  </p>
                    <a  href="index.php?ctrl=gioithieu" class="gach"> Giới Thiệu   </a> <br>
                    <a href="index.php?ctrl=lienhe" class="gach">  Liên Hệ  </a> <br>
                    <a  href="index.php?ctrl=signup" class="gach">   Đăng Kí  </a>


                </ul>
            </div>
        </div>
    </footer>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
