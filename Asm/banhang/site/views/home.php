<div class="container">
    <div class="slogan">
        <h1 style="text-align: center;">Ruri - Uy Tín là Sức Mạnh</h1>
    </div>
    <div class="banner" style="border: 5px solid white">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="Images/banner1.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/banner2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/banner3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="Images/banner4.jpeg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div style="clear: both; height: 6px;"></div>
    <div class="show-product">
        <div class="container bg-white pb-5">
            <div class="col-sm-12 p-0 bg-white">
                <div class="name-collection">
                    <p>Sản phẩm mới</p>
                </div>
            </div>
            <div class="pt-2">
                <div class="card-columns">
                    <div class="col">
                        <?php foreach ($listSPMoi as $sp) {?>
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
        </div>
    </div>
    <div class="show-product">
        <div class="container bg-white pb-5">
            <div class="col-sm-12 p-0 bg-white">
                <div class="name-collection">
                    <p>Sản phẩm Hot</p>
                </div>
            </div>
            <div class="pt-2">
                <div class="card-columns">
                    <div class="col">
                        <?php foreach ($listSPHot as $sp) {?>
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
        </div>
    </div>
    <div class="show-product">
        <div class="container bg-white pb-5">
            <div class="col-sm-12 p-0 bg-white">
                <div class="name-collection">
                    <p>Sản phẩm bán chạy</p>
                </div>
            </div>
            <div class="pt-2">
                <div class="card-columns">
                    <div class="col">
                        <?php foreach ($listSPSell as $sp) {?>
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
        </div>
    </div>
    </div>
