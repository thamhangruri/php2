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
<form method="POST" id="formlogin" action="?ctrl=login&act=forgot" >
    <h2 class="text-center"> Quên mật khẩu </h2>
    <div class="form-group mb-3">
        <label for="user">Email</label><br>
        <input class="form-control" type="text" name="email" id="email" required  placeholder="Nhập email">
    </div>
    <div class="form-group mb-0 text-center">
        <input class="btn btn-primary btn-block" type="submit" name="login" value="Gửi">
    </div>

</form>
</body>
