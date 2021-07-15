
<div class="col-9">
    <form method="post" action="?ctrl=nhasanxuat&act=update">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Tên nhà sản xuất</label> <br>
            <input name="tenNSX" value="<?=$row['TenNSX']?>" type="text">
        </div>
        <div class="mb-3">
            <label  class="form-label"> Hình </label>
            <input name="Hinh" type="file" value="<?=$row['url_Hinh']?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"> Thứ tự </label><br>
            <input name="thuTu" value="<?=$row['ThuTu']?>" type="text">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Hiện</label>
            <input name="anHien" value="<?=$row['AnHien']?>" type="checkbox">
        </div>
        <button name="nutsave" type="submit" class="btn btn-primary"> Lưu</button>
        <input name="idNSX" type="hidden" value="<?=$row['idNSX']?>">
    </form>
</div>
