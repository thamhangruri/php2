<nav aria-label="breadcrumb"
     style="background: linear-gradient(180deg,#faeddf 3.85%,#f1d7ca 17.64%),#f4e1d3!important;">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#" style="color: black">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="#" style="color: black">Điện thoại</a></li>
    </ol>
</nav>
<div class="show-product">
    <div class="container bg-white pb-5">
        <div class="col-sm-12 p-0 bg-white">
            <div class="name-collection">
                <p>Tất cả sản phẩm</p>
            </div>
        </div>
        <div class="pt-2">
            <div class="card-columns">
                <div class="col">
                    <?php foreach ($allproducts as $sp) {?>
                        <div class="card" style="height: 520px;">
                            <a href="?ctrl=home&act=detail&id=<?=$sp['idDT']?>"><img src="Images/<?=$sp['urlHinh']?>" class="card-img-top pt-2" alt="..." width="100%"></a>
                            <div class="card-body text-collection text-center">
                                <p class="card-title" style="font-weight: bold;"><a href="?ctrl=home&act=detail&id=<?=$sp['idDT']?>" style="background-color: white; color: black"> <?=$sp['TenDT']?> </a></p>
                                <p class="card-text" style="color: #0055aa; font-weight: bold"> <?= number_format($sp['Gia'])?> VNĐ</p>
                                <a href="?ctrl=home&act=cart&what=add&id=<?=$sp['idDT']?>" class="btn ">Đặt mua</a>
                                <a href="?ctrl=home&act=detail&id=<?=$sp['idDT']?>" class="btn ">Xem chi tiết</a>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example" style="background-color: white;">
            <ul class="pagination bg-white justify-content-center" style="margin: 0 auto;">
                <?php
                $i = 1;
                $total_page = ceil($total['totalrecord'] / $limit);
                while ($i<=$total_page) {
                    echo '<li class="page-item"><a class="page-link" style="background-color: #463c3c;color: white;" href="index.php?ctrl=home&act=allproducts&current_page=' . $i . '">' . $i . '</a></li>
                    ';
                    $i++;
                }
                ?>
            </ul>
        </nav>
    </div>
