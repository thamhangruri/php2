<div style="width: 50%;margin: 0 auto;border: 1px solid lightgrey;padding: 15px;
background-color: #fbf9f9;margin-top: 20px">
<form action="?ctrl=users&act=store" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label  class="form-label"> Họ và tên </label>
        <input name="hoten" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label"> Hình </label>
        <input name="Hinh" type="file" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label"> Tên tài khoản </label>
        <input name="username" type="text" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label"> Mật khẩu </label>
        <input name="password" type="password" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label"> Xác nhận mật khẩu </label>
        <input name="GiaKM" type="password" class="form-control">
    </div>
    <div class="mb-3">
        <label  class="form-label"> Email </label>
        <input name="email" type="email" class="form-control">
    </div>
    <div class="mb-3 form-check">
        <input name="AnHien" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Hiện</label>
    </div>
    <button type="submit" class="btn btn-primary"> Thêm </button>
</form>
</div>
