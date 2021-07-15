<nav aria-label="breadcrumb"
     style="background: linear-gradient(180deg,#faeddf 3.85%,#f1d7ca 17.64%),#f4e1d3!important;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="color: black">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Điện thoại</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="#" style="color: black"><?= $sp['TenDT'] ?></a></li>
    </ol>
</nav>
<div class="show-product p-0">
    <div class="container bg-white">
        <div class="row mt-4 pt-3"> <!-- Hiển thị thông tin -->
            <div class="col-sm-4">
                <img src="<?= ROOT_URL ?>/site-copy/Images/<?= $sp['urlHinh'] ?>" class="zoom" alt="NC01221" width="100%">
            </div>
            <div class="col-sm-8 text-collection">
                <h4 class=""><a href="#"
                                style="background-color: white; color: black;font-weight: 600;"><?= $sp['TenDT'] ?></a>
                </h4>
                <p style="font-size: 15px;">LƯỢT XEM: <?= $sp['SoLanXem'] ?> lượt</p>
                <p style="font-size: 18px; font-weight: bold">GIÁ: <span> <?= number_format($sp['Gia']) ?> VNĐ</span>
                </p>
                <p style="font-size: 14px;"><i class="far fa-heart"></i> YÊU THÍCH SẢN PHẨM</p>
                <p style="font-size: 14px;"><i class="fas fa-shopping-bag"></i> MUA SAU</p>
                <hr>
                <p>Số lượng: <input type="text" value="1" style="text-align: center; margin-left: 30px; width: 50px;">
                </p>
                <div class="row text-uppercase">
                    <div class="col-sm-3">
                        <a href="<?= ROOT_URL ?>/them-vao-gio-hang/" class="btn">Thêm vào giỏ hàng</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="btn ">Hotline: 0846.877.769</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="btn ">Đặt lịch hẹn tại cửa hàng</a>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="btn ">Chat với tư vấn viên</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="thongtin-sp mt-5"> <!-- Chi tiết sản phẩm -->
            <h4>CHI TIẾT SẢN PHẨM</h4>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <h4> Mô Tả </h4>
                    <p> <?= $sp['MoTa'] ?> </p>
                </div>
                <div class="col-sm-6" style="border-left: 1px solid lightgray;">
                    <h4> Thông số kỹ thuật </h4>
                    <ul class="list-group">
                        <?php if ($sp['GiaKM'] == 0) {
                            echo '<li class="list-group-item">Giá khuyến mãi: Không khuyến mãi</li>';
                        } else {
                            echo '<li class="list-group-item">Giá khuyến mãi: ' . number_format($sp['GiaKM']) . 'VND </li>';
                        } ?>
                        <li class="list-group-item">Màn hình: <?= $thuoctinh['ManHinh']; ?> </li>
                        <li class="list-group-item">Hệ điều hành: <?= $thuoctinh['HeDieuHanh']; ?> </li>
                        <li class="list-group-item">Camera sau: <?= $thuoctinh['CameraSau']; ?> </li>
                        <li class="list-group-item">Camera trước: <?= $thuoctinh['CameraTruoc']; ?></li>
                        <li class="list-group-item">CPU: <?= $thuoctinh['CPU']; ?> </li>
                        <li class="list-group-item">RAM: <?= $thuoctinh['RAM']; ?> </li>
                        <li class="list-group-item">Bộ nhớ trong: <?= $thuoctinh['BoNhoTrong']; ?> </li>
                        <li class="list-group-item">Thẻ nhớ: <?= $thuoctinh['TheNho']; ?> </li>
                        <li class="list-group-item">Thẻ SIM: <?= $thuoctinh['TheSIM']; ?> </li>
                        <li class="list-group-item">Dung lượngPin:<?= $thuoctinh['DungLuongPin'] ?></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div><h4>Bình Luận</h4></div>
        <div class="row ml-2">
            <form action="index.php?ctrl=home&act=comment&idsp=<?php echo $_GET['id'] ?>&uid=<?php echo $_SESSION['user']['uid'] ?>"
                  method="post" style="margin: 0 auto;">
                <?php

                if (isset($_SESSION['user'])) {
                    echo '<h5 style="text-align: center;"> Gửi Bình Luận </h5>
                        <div class="row">
                            <div class="col-sm-1"><img src="'.ROOT_URL.'/site/Images/'.$_SESSION['user']['hinh'].'" width="80px"> </div>
                            <div class="input-group mb-3 col-sm-11" style="width: 900px; height: 70px">
                              <input type="text" id="cmt" name="cmt" style="height: 70px" class="form-control" placeholder="Nhập Bình Luận..." aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Bình luận</button>
                              </div>
                            </div>
                        </div>
                            ';
                } else {
                    echo '<p>Đăng nhập để bình luận <a href="?ctrl=login" style="margin-left:10px;">Đăng nhập</a></p>';
                }
                ?>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php
                foreach ($comment as $cmt) {
                    $imgUsers = $this->model->getUserOfBL($cmt['idUsers']);
                    $role = '';
                    if ($cmt['vaiTro'] == 0) {
                        $role = 'Khách hàng';
                    } else $role = 'Quản trị viên';
                    echo ' 
                <div class="row col-sm-12 mt-5">
                    <div class="col-sm-1">
                        <img src="<?= ROOT_URL ?>/site/Images/' . $imgUsers['urlHinh'] . '" width="100px">
                    </div>
                    <div class=" row col-sm-10 ml-3">
                        <div class="col-sm-9" style="color: blue;font-size: 12pt;" >' . $_SESSION[user][name] . ' - ' . $role . ' </div>
                        <div class="col-sm-3"> ' . $cmt['ThoiDiemBL'] . ' </div>
                        <div class="col-sm-6" style="font-size: 13pt;"> ' . $cmt['NoiDungBL'] . ' </div>
                    </div>
               </div>
                ';
                    if (isset($_SESSION['user']['name'])) {
                        if ($cmt['idUsers'] == $_SESSION['user']['uid']) {
                            echo '
                   <div>
                        <form method="post" action="index.php?ctrl=home&act=suacomment&id=' . $cmt['idBL'] . '">
                            Sửa bình luận:  <input type="text" name="suacmt" value="' . $cmt['noiDung'] . ' " placeholder="Sửa bình luận" style="width: 50%;height: 30px;font-size: 12pt; color: gray">
                            <button type="submit" style="border: none;cursor: pointer;background: lightblue;font-size: 11pt;padding: 10px;">Sửa</button>
                        </form>
                   </div>
                   ';
                        }
                    }

                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="txt ml-2">
                <h4>CÓ THỂ BẠN THÍCH</h4>
            </div>
            <div class="card-columns">
                <div class="col">
                    <?php foreach ($spHot as $sp) { ?>
                        <div class="card">
                            <a href="?ctrl=home&act=detail&id=<?= $sp['idDT'] ?>"><img
                                        src="Images/<?= $sp['urlHinh'] ?>" class="card-img-top pt-2" alt="..."
                                        width="100%"></a>
                            <div class="card-body text-collection text-center">
                                <p class="card-title" style="font-weight: bold;"><a
                                            href="?ctrl=home&act=detail&id=<?= $sp['idDT'] ?>"
                                            style="background-color: white; color: black"> <?= $sp['TenDT'] ?> </a></p>
                                <p class="card-text"
                                   style="color: #0055aa; font-weight: bold"> <?= number_format($sp['Gia']) ?> VNĐ</p>
                                <a href="#" class="btn ">Đặt mua</a>
                                <a href="?ctrl=home&act=detail&id=<?= $sp['idDT'] ?>" class="btn ">Xem chi tiết</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

