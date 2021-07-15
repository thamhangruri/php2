
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/bc2f081eaf.js" crossorigin="anonymous"></script>
    <script src="views/ckeditor/ckeditor.js"></script>
    <title>Tiêu đề website </title>
</head>
<body>
<div class="container-fluid p-0 m-0">
    <header class="row p-0 m-0 shadowne">
        <div class="col-sm-2 bdbottom">
            <div class=" logo align-self-center ">
                <img src="Images/LOGOVTweb2-1.png" width="20%" height="35px">
                <p> Admin Manager</p>
            </div>
        </div>
        <div class="col-sm-10 bg-white" style="border-bottom: 1px solid lightgray;">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-3">
                    <form class="d-flex" style="    margin-block-end: 0;padding-top: 10px;">
                        <input class="form-control me-2  border-0" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                        <a href="#" style="cursor: pointer; color: midnightblue"><i class="fas fa-search" style="font-size: 20px; padding-top: 10px"></i></a>
                    </form>
                </div>
                <div class="col-sm-3">
                    <div class="dropdown" style="padding-top: 10px;padding-left: 35%;">
                        <button class="btn shadow-none dropdown-toggle col-sm-12" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="Images/<?=$_SESSION['admin']['image']?>" style="border-radius: 100%" width="30px" height="30px">
                            <?php
                                echo $_SESSION['admin']['username'];
                                ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="controllers/login.php?act=logout">Đăng xuất </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="row noidung p-0 m-0">
        <aside class="col-2 box-shadow p-0 pt-3 ">
            <div class="dashboard">
                <a href="?ctrl=home"> <i class="fas fa-home" style="padding-right: 10px"></i>Trang chủ </a>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button shadow-none border-0 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                aria-controls="collapseOne">
                            <i class="fab fa-apple" style="padding-right: 10px"></i> Quản lý nhà sản xuất
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><a href="?ctrl=nhasanxuat">Danh sách nhà sản xuất</a></p>
                            <p><a href="?ctrl=nhasanxuat&act=addnew">Thêm nhà sản xuất</a></p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button shadow-none border-0 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                            <i class="fas fa-list-alt" style="padding-right: 10px"></i> Quản lý điện thoại
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse shadow-none border-0 collapse"
                         aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><a href="?ctrl=dienthoai">Danh sách điện thoại</a></p>
                            <p><a href="?ctrl=dienthoai&act=addnew">Thêm điện thoại</a></p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="shadow-none border-0" style="padding: 15px;width: 100%;text-align: left;">
                            <a href="?ctrl=donhang" style="color: lightgray;text-decoration: none;font-size: 17px;padding-left: 5px;">
                                <i class="fas fa-clipboard-list" style="padding-right: 10px"></i>Quản lý đơn hàng</a>
                        </button>
                    </h2>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button shadow-none border-0 collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                            <i class="fas fa-user" style="padding-right: 10px"></i>Quản lý người dùng
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                         data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p><a href="?ctrl=users">Danh sách người dùng</a></p>
                            <p><a href="?ctrl=users&act=addnew">Thêm người dùng</a></p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="shadow-none border-0" style="padding: 15px;width: 100%;text-align: left;">
                            <a href="?ctrl=binhluan" style="color: lightgray;text-decoration: none;font-size: 17px;padding-left: 5px;">
                                <i class="fas fa-clipboard-list" style="padding-right: 10px"></i>Quản lý bình luận</a>
                        </button>
                    </h2>
                </div>
            </div>
        </aside>
        <main class="col-10 bg-white mx-n2 mt-3">
            <h1 class="h5 py-2 border-bottom" style="color: #24344e">
                <?= (isset($page_title) == true) ? $page_title : "Trang Quản Trị"; ?>
            </h1>
            <?php
            if (file_exists($page_file)) require_once "$page_file";
            ?>
        </main>
    </div>
</div>
</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

