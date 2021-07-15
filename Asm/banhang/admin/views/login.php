<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
    body{
        background-color: #0f74a8;
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
<form method="POST" id="formlogin" >
    <h2 class="text-center"> Đăng nhập</h2>
    <div class="form-group mb-3">
        <label for="user">Tên tài khoản</label><br>
        <input class="form-control" type="text" name="username" id="user" required  placeholder="Nhập tên tài khoản">

    </div>

    <div class="form-group mb-3">
        <label for="password">Mật khẩu</label> <br>
        <input class="form-control" type="password" name="password" required id="password" placeholder="Nhập mật khẩu">
    </div>

    <div class="form-group mb-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
            <label class="custom-control-label" for="checkbox-signin">Nhớ tài khoản</label>
        </div>
    </div>

    <div class="form-group mb-0 text-center">
        <input class="btn btn-primary btn-block" type="submit" name="login" value="Đăng Nhập">
    </div>

</form>
</body>