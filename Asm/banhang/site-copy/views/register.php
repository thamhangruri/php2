<body style="background-color:#9c3328 ;">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<div style="width: 50%;margin: 0 auto;border: 1px solid lightgrey;padding: 15px;
background-color: #fbf9f9;margin-top: 20px">
    <form action="?ctrl=login&act=store" method="post" enctype="multipart/form-data">
        <h4 style="text-align: center">Chào mừng bạn trở thành thành viên mới</h4>
        <div class="form-group">
            <label  class="form-label"> Họ và tên </label>
            <input name="hoten" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label  class="form-label"> Địa chỉ </label>
            <input name="diachi" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label  class="form-label"> Hình </label>
            <input name="Hinh" type="file" class="form-control">
        </div>
        <div class="form-group">
            <label  class="form-label"> Tên tài khoản </label>
            <input name="username" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label  class="form-label"> Mật khẩu </label>
            <input name="password" type="password" class="form-control">
        </div>
        <div class="form-group">
            <label  class="form-label"> Xác nhận mật khẩu </label>
            <input name="enterpassword" type="password" class="form-control">
        </div>
        <div class="form-group">
            <label  class="form-label"> Email </label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="form-group form-check">
            <input name="AnHien" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Hiện</label>
        </div>
        <button type="submit" class="btn btn-primary"> Đăng ký </button>
    </form>
</div>
</body>
