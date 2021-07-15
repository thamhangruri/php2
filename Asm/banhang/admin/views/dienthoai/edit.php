<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<div>
    <form action="?ctrl=dienthoai&act=update" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-6">
                <div class="border p-3" style="width: 98%;background-color: #fbf9f9;">
                    <div class="mb-3">
                        <label class="form-label"> Tên Điện Thoại </label>
                        <input value="<?php echo $row['TenDT'] ?>" name="TenDT" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Hình </label>
                        <input value="<?php echo $row['urlHinh'] ?>" name="Hinh" type="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Giá </label>
                        <input value="<?php echo $row['Gia'] ?>" name="Gia" type="text"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Giá Đã Giảm</label>
                        <input value="<?php echo $row['GiaKM'] ?>" name="GiaKM" type="text"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Số Lượng </label>
                        <input value="<?php echo $row['SoLuongTonKho'] ?>" name="SoLuong" type="text"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <select name="idNSX" class="form-select" aria-label="Default select example">
                            <option selected> Chọn Nhà Sản Xuất</option>
                            <?php
                            foreach ($tennsx as $value) {
                                if ($row['idNSX'] == $value['idNSX']) {
                                    echo '<option value="' . $value['idNSX'] . '" selected>' . $value['TenNSX'] . '</option>';
                                } else {
                                    echo '<option value="' . $value['idNSX'] . '">' . $value['TenNSX'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Mô Tả</label>
                        <div class="form-floating">
                            <div style="border: 1px solid lightgray;">
                                <textarea id="ten" name="MoTa" class="form-control"
                                          id="floatingTextarea"><?php echo $row['MoTa'] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="idDT" value="<?= $idDT ?>">
                        <div class="mb-3 form-check">
                            <input name="AnHien" type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Hiện</label>
                        </div>
                        <script>
                            CKEDITOR.replace('ten', {
                                filebrowserBrowseUrl: '../lib/ckfinder/ckfinder.html',
                                filebrowserUploadUrl: '../lib/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="border p-3" style="width: 98%;background-color: #fbf9f9;">
                    <h4 style="text-align: center"> Thông số kỹ thuật </h4>
                    <div class="mb-3">
                        <label class="form-label"> Màn hình </label>
                        <input name="ManHinh" value="<?php echo $tt['ManHinh'] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Hệ điều hành </label>
                        <input name="HeDieuHanh" value="<?php echo $tt['HeDieuHanh'] ?>" type="text"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Camera Sau </label>
                        <input name="CameraSau" value="<?php echo $tt['CameraSau'] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Camera Trước </label>
                        <input name="CameraTruoc" value="<?php echo $tt['CameraTruoc'] ?>" type="text"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> CPU </label>
                        <input name="CPU" value="<?php echo $tt['CPU'] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> RAM </label>
                        <input name="RAM" value="<?php echo $tt['RAM'] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Bộ nhớ trong </label>
                        <input name="BoNhoTrong" value="<?php echo $tt['BoNhoTrong'] ?>" type="text"
                               class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Thẻ nhớ </label>
                        <input name="TheNho" value="<?php echo $tt['TheNho'] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Thẻ SIM </label>
                        <input name="TheSim" value="<?php echo $tt['TheSIM'] ?>" type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Dung Lượng Pin </label>
                        <input name="DungLuongPin" value="<?php echo $tt['DungLuongPin'] ?>" type="text"
                               class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;margin-top: 3%">
            <button type="submit" class="btn btn-primary"> Sửa</button>
        </div>
    </form>
</div>
</body>
</html>