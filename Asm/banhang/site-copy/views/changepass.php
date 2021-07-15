<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
    body{
        background-color:#9c3328 ;
    }
    form{
        border: 1px solid lightgrey;
        width: 500px;
        background-color: white;
        margin:0 auto;
        padding: 20px;
        margin-top: 10%;
    }
</style>
<body>
<form method="POST" id="formlogin" action="?ctrl=login&act=passnew&pass=<?php echo $customer['Password']?>&uid=<?php echo $customer['idUsers']?>" >
    <h2 class="text-center"> Đăng nhập</h2>

    <div class="form-group mb-3">
        <label for="password">Mật khẩu cũ</label> <br>
        <input class="form-control" type="password" name="oldPass" required id="password" placeholder="Nhập mật khẩu cũ">
    </div>
    <div class="form-group mb-3">
        <label for="password">Mật khẩu mới</label> <br>
        <input class="form-control" type="password" name="newPass" required id="password" placeholder="Nhập mật khẩu mới">
    </div>
    <div class="form-group mb-3">
        <label for="password">Xác nhận mật khẩu mới</label> <br>
        <input class="form-control" type="password" name="enterNewPass" required id="password" placeholder="Nhập lại mật khẩu mới">
    </div>
    <div class="form-group mb-0 text-center">
        <input class="btn btn-primary btn-block" type="submit" name="login" value="Chấp nhận">
    </div>

</form>
</body>

