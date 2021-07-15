<div style="width: 50%;margin: 0 auto;border: 1px solid lightgrey;padding: 15px;background-color: #fbf9f9;margin-top: 50px">
<form method="post" action="?ctrl=nhasanxuat&act=store" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> <b>Tên nhà sản xuất</b></label>
        <input name="TenNSX" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label"><b> Hình</b> </label>
        <input name="Hinh" type="file" class="form-control">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"><b> Thứ tự </b></label>
        <input name="ThuTu" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label"><b> Hiện </b></label>
        <input name="AnHien" type="checkbox">
    </div>
    <button name="nutsave" type="submit" class="btn btn-primary"> Thêm</button>
</form>
</div>