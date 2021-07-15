<style>
    .ptck p{
        margin-left: 15px;
    }
    .form-group{
        width: 85%;
        margin: 0 auto;
    }
    .form-group label{
        margin-top: 10px;
    }
    .custom{
        width: 90%;
        margin: 0 auto;
    }
    .custom2{
        width: 95%;
        margin: 0 auto;
    }
</style>
<div class="container">
<form action="?ctrl=home&act=luudonhang" method="post" onsubmit="return validate()" class="bg-white mt-5 pt-5 mb-5">
    <fieldset class="border mb-2 p-3 w-80 custom">
        <legend class=" fw-bold text-center"><b>Thông tin người nhận hàng</b></legend>
        <?php if(isset($_SESSION['user'])){
            echo'<div class="form-group">
            <label for="formGroupExampleInput">Họ và tên</label>
            <input type="text" id="name" class="form-control" value="'.$_SESSION['user']['name'].'" id="formGroupExampleInput" name="HoTen">
            <div id="loiname" style="color:red"></div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Địa chỉ</label>
            <input type="text" id="address" class="form-control" value="'.$_SESSION['user']['diachi'].'" id="formGroupExampleInput2" name="DiaChi">
            <div id="loiaddress" style="color:red"></div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput3">Số điện thoại</label>
            <input type="text" id="sdt" class="form-control" id="formGroupExampleInput3" name="Sdt">
            <div id="loi" style="color:red"></div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput4">Email</label>
            <input type="text" class="form-control" value="'.$_SESSION['user']['email'].'" id="formGroupExampleInput4" name="Email">
        </div>';
        } else{ ?>
        <div class="form-group">
            <label for="formGroupExampleInput">Họ và tên</label>
            <input type="text" id="name" class="form-control" id="formGroupExampleInput" name="HoTen">
            <div id="loiname" style="color:red"></div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Địa chỉ</label>
            <input type="text" id="address" class="form-control" id="formGroupExampleInput2" name="DiaChi">
            <div id="loiaddress" style="color:red"></div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput3">Số điện thoại</label>
            <input type="text" id="sdt" class="form-control" id="formGroupExampleInput3" name="Sdt">
            <div id="loi" style="color:red"></div>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput4">Email</label>
            <input type="text" class="form-control" id="formGroupExampleInput4" name="Email">
        </div>
        <?php } ?>
        <div class="form-group">
            <label for="formGroupExampleInput5">Ghi chú</label> <br>
            <textarea style="border:1px solid #8a8a8a" rows="4" cols="100" name="GhiChu" id="formGroupExampleInput5"></textarea>
        </div>
    </fieldset>
        <div class="d-flex custom2">
            <fieldset class="border p-3 mr-2 col-6">
                <legend class="text-primary fw-bold text-center">Phương thức thanh toán</legend>
                <div class="form-group row ml-2 ptck">
                    <p><input type="radio" name="phuongthuctt" value="Chuyển khoản"> Chuyển khoản</p>
                    <p><input type="radio" name="phuongthuctt" value="Khi nhận"> Khi nhận hàng</p>
                    <p><input type="radio" name="phuongthuctt" value="Onepay"> Onepay</p>
                    <p><input type="radio" name="phuongthuctt" value="Ngân Lượng"> Ngân Lượng</p>
                </div>
            </fieldset>
            <fieldset class="border p-3 col-6">
                <legend class="text-primary fw-bold text-center">Phương thức giao hàng</legend>
                <div class="form-group row ml-2 ptck">
                    <p><input type="radio" name="phuongthucgh" value="Giao hàng nhanh"> Giao hàng nhanh</p>
                    <p><input type="radio" name="phuongthucgh" value="Giao hàng tiết kiệm"> Giao hàng tiết kiệm</p>
                    <p><input type="radio" name="phuongthucgh" value="VN Post"> VN Post</p>
                    <p><input type="radio" name="phuongthucgh" value="Viettel"> Viettel</p>
                </div>
            </fieldset>
        </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary mt-5 mb-5">Thanh Toán</button>
    </div>
</form>
</div>
<script>
function validate() {
var count = 0;

var name = document.getElementById('name');
if (name.value.length == 0) {
document.getElementById('loiname').innerHTML = "Vui lòng nhập họ tên";
count++;
}
var address = document.getElementById('address');
if (address.value.length == 0) {
document.getElementById('loiaddress').innerHTML = "Vui lòng nhập địa chỉ";
count++;
}
var sdt1 = document.getElementById('sdt');
if (sdt1.value.length == 0 || sdt1.value.length!=10) {
document.getElementById('loi').innerHTML = "Vui lòng nhập số điện thoại";
count++;
} else {
var sdt = parseInt(document.getElementById('sdt').value);
if (isNaN(sdt) == true) {
document.getElementById('loi').innerHTML = "Vui lòng nhập số";
count++;
}
}

if (count > 0) {
return false;
} else return true;

}
</script>

