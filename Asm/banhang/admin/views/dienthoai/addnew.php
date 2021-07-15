<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

</head>
<body>
<form action="?ctrl=dienthoai&act=store" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="border p-3" style="width: 98%;background-color: #fbf9f9;">
                <h4 style="text-align: center"> Thông tin điện thoại </h4>
                <div class="mb-3">
                    <label  class="form-label"> Tên Điện Thoại </label>
                    <input name="TenDT" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Hình </label>
                    <input name="Hinh" type="file" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Giá </label>
                    <input name="Gia" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Giá Đã Giảm</label>
                    <input name="GiaKM" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Số Lượng </label>
                    <input name="SoLuong" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"></label>
                    <select name="idNSX" class="form-select" aria-label="Default select example">
                        <option selected> Chọn Nhà Sản Xuất</option>
                        <?php
                      foreach ( $tennsx as $value){
                           echo '<option value="'.$value['idNSX'].'">'.$value['TenNSX'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Mô Tả</label>
                    <div style="border: 1px solid lightgray;">
                            <textarea id="ten" name="MoTa" class="form-control" id="floatingTextarea" ></textarea>
                    </div>
                </div>
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
        <div class="col-sm-6">
            <div class="border p-3" style="width: 98%;background-color: #fbf9f9;">
                <h4 style="text-align: center"> Thông số kỹ thuật </h4>
                <div class="mb-3">
                    <label  class="form-label"> Màn hình </label>
                    <input name="ManHinh" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Hệ điều hành </label>
                    <input name="HeDieuHanh" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Camera Sau </label>
                    <input name="CameraSau" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Camera Trước </label>
                    <input name="CameraTruoc" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> CPU </label>
                    <input name="CPU" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> RAM </label>
                    <input name="RAM" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Bộ nhớ trong </label>
                    <input name="BoNhoTrong" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Thẻ nhớ </label>
                    <input name="TheNho" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Thẻ SIM </label>
                    <input name="TheSim" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label  class="form-label"> Dung Lượng Pin </label>
                    <input name="DungLuongPin" type="text" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;margin-top: 3%">
        <button type="submit" class="btn btn-primary"> Thêm </button>
    </div>
</form>
</body>
</html>