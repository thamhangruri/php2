<!--Section: Block Content-->
<form action="?ctrl=home&act=update" class="mt-5" method="post">
    <section>
        <!--Grid row-->
        <div class="row">
            <div class="container">
                <!-- Card -->
                <div class="card wish-list mb-3">
                    <div class="card-body">
                        <h5 class="mb-4"> Giỏ hàng </h5>
                        <div class="container mb-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped text-center">
                                            <thead>
                                            <tr>
                                                <th scope="col"> STT</th>
                                                <th scope="col">Hình</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col" class="text-center">Số lượng</th>
                                                <th scope="col" class="text-right">Giá</th>
                                                <th scope="col" class="text-right">Thành tiền</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1;$totalprice=0; foreach ($_SESSION['giohang'] as $idProduct => $sp){
                                                $subtotal=($sp['Gia']*$sp['Amount']);
                                                $totalprice+=$subtotal;
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><img style="width: 50px" src="<?=ROOT_URL?>/site-copy/Images/<?=$sp['urlHinh']?>"/></td>
                                                    <td><?=$sp['TenDT']?></td>
                                                    <td>
                                                        <div>
                                                            <div class="def-number-input number-input safari_only w-100">
                                                                <a onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                        class="minus btn bg-danger border-0" style="padding: 5px;"><i class="fas fa-minus-square" style="color:white;"></i></a>
                                                                <input class="quantity text-center" min="0" max="<?php echo $sp['soluongtonkho']?>" name="quantity[<?php echo $sp['idDT'] ?>]"
                                                                       value="<?php echo $sp['Amount'] ?>" type="number" style="width: 60px;">
                                                                <a onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                        class="plus btn bg-info border-0" style="padding: 5px;"><i class="fas fa-plus-square" style="color:white;"></i></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right"><?=number_format($sp['Gia'])?></td>
                                                    <td class="text-right"><?= number_format($sp['Gia']*$sp['Amount'])?></td>
                                                    <td class="text-right">
                                                        <a href="<?=ROOT_URL?>/xoa-khoi-gio-hang/<?=$idProduct?>" class="btn btn-sm btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <?php $i++; } ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Tổng Tiền </td>
                                                <td class="text-right"><?php echo number_format($_SESSION['infor']['total']) ?> VNĐ</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col mb-2">
                                    <div class="row">
                                        <div class="col-sm-12  col-md-6 d-flex">
                                            <a href="?ctrl=home&act=allproducts" class="btn btn-light border col-md-6 align-self-center" style="padding: 11px;" ><p style="margin-bottom: 0;">Tiếp tục mua hàng</p></a>
                                            <a href="?ctrl=home&act=xoagiohang" class="btn btn-light border col-md-6 align-self-center" style="padding: 11px;" ><p style="margin-bottom: 0;" onclick="return ConfirmDelete()">Xóa giỏ hàng</p></a>
                                        </div>
                                        <div class="col-sm-12 col-md-6 text-right">
                                            <input type="submit" class="btn btn-light border col-md-6 align-self-center" style="float: left;height: 46px" value="Cập nhật giỏ hàng" >
                                            <a href="?ctrl=home&act=thanhtoan" class="btn btn-light border col-md-6 align-self-center" style="padding: 11px;background-color: #388e3f; color: white;">Thanh Toán
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function ConfirmDelete() {
                var x = confirm("Bạn có chắc muốn xóa hay không?");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
        <!--Grid row-->
    </section>
</form>>

<!--Section: Block Content-->
