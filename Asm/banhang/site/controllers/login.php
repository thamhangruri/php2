<?php
require_once "models/model_login.php"; //nạp model để có các hàm tương tác db
class login
{
    function __construct()
    {
        $this->model = new model_login();
        $act = "login";//chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
            case "index":
                $this->index();
                break;
            case "login":
                $this->login();
                break;
            case "logout":
                $this->logout();
                break;
            case "register":
                $this->register();
                break;
            case "store":
                $this->store();
                break;
            case "quenmk":
                $this->quenmk();
                break;
            case "forgot":
                $this->forgot();
                break;
            case"changepass":
                $this->changepass();
                break;
            case"passnew":
                $this->passnew();
                break;
        }
        //$this->$act;
    }


    function login()
    {
        if (isset($_POST['login'])) {
            $username = $_POST['userName'];
            $password = $_POST['passWord'];
            $a = $this->model->login($username, $password);
            $check = $a->fetch();
            if ($check != null) {
                if (!isset($_SESSION["user"])) {

                    $_SESSION['user']['username'] = $check['Username'];
                    $_SESSION['user']['role'] = $check['VaiTro'];
                    $_SESSION['user']['uid'] = $check['idUsers'];
                    $_SESSION['user']['name'] = $check['HoTen'];
                    $_SESSION['user']['password'] = $check['Password'];
                    $_SESSION['user']['diachi'] = $check['diaChi'];
                    $_SESSION['user']['email'] = $check['Email'];
                    $_SESSION['user']['hinh'] = $check['urlHinh'];
                }
                    header('location: ../site/');
            } else {
                echo '<script>alert("Đăng nhập không thành công! Vui lòng đăng nhập lại");window.location="?ctrl=login"</script>';
            }
        }

        require 'views/login.php';
    }

    function logout()
    {
        unset($_SESSION["user"]);
        header('location:?ctrl=home');
    }
    function register(){
        require 'views/register.php';
        echo __METHOD__;
    }
    function store(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $enterpassword = $_POST['enterpassword'];
        $hoten = $_POST['hoten'];
        $diachi = $_POST['diachi'];
        $Hinh = $_FILES['Hinh']['name'];
        $path = 'Images/$Hinh';
        $email = $_POST['email'];
        $checkmail=$this->model->checkExistEmail($email);
        $checkusername=$this->model->checkExistUsername($username);
        if (isset($_POST['AnHien'])){
            $anHien = '1';}
        else{
            $anHien='0';
        }
        move_uploaded_file($_FILES["Hinh"]["tmp_name"], $path);

        $thongbao='';
        $count=0;
        $countt=0;
        if(empty($hoten)){
                $thongbao='Chưa nhập tên';
                $countt++;
        }
        else if(empty($diachi)){
            $thongbao='Chưa nhập địa chỉ';
            $countt++;
        }
        else if(empty($username)){
            $thongbao='Chưa nhập tên đăng nhập';
            $countt++;
        }
        else if(empty($password)){
            $thongbao='Chưa nhập mật khẩu';
            $countt++;
        }
        else if(empty($enterpassword)){
            $thongbao='Vui lòng xác nhận mật khẩu';
            $countt++;
        }
        else if(empty($email)){
                $thongbao='Chưa nhập email';
                $countt++;
        }
        if($countt==0)
        {

            if(!empty($checkmail)) {
                $thongbao='Email đã tồn tại, vui lòng nhập email khác !';
                $count++;
            }

            else  if(!empty($checkusername)) {
                $thongbao='Tên đăng nhập đã tồn tại,vui lòng nhập tên tài khoản khác !';
                $count++;

            }
            else  if($password != $enterpassword) {
                $thongbao='Mật khẩu không khớp';
                $count++;

            }
            if($count>0){
                echo '<script type="text/javascript">
                        alert ("'.$thongbao.'");
                        history.back();
                    </script>';
            } else {
                $this->model->registerCustomer($username,$password,$hoten,$diachi,$Hinh,$email,$anHien);
                echo '
                    <script type="text/javascript">
                        alert ("Đăng ký thành công");
                        window.location="?ctrl=login"
                    </script>';
            }
        }
        else {
            echo '<script type="text/javascript">
                alert ("'.$thongbao.'");
                window.location="?ctrl=login&act=register"
            </script>';
        }
    }
    function quenmk(){
        require 'views/forgot.php';
    }
    function forgot(){
        $thongbao='';
        $email=trim(strip_tags( $_POST['email'])); ;
        $check=$this->model->checkExistEmail($email);
        if(empty($check)){
            echo '
               <script type="text/javascript">
               alert ("Email không phải thành viên");
               history.back();
               </script>
               ';
        }
        else {
            $pass=random_int(0, 999999);
            $pass_moi = md5($pass); // phát sinh số ngẫu nhiên, mã hóa md5 ra 32 ký tự
            $this->model->changePasswordForgot($email,$pass_moi);
            $this->model->sendMail($email,$pass);
            echo $thongbao;
        }

    }
    function changepass(){
        $uid=$_SESSION['user']['uid'];
        $customer=$this->model->getCustomerById($uid);
        require 'views/changepass.php';
    }
    function passnew(){
    $uid=$_GET['uid'];
    $pass=$_GET['pass'];
    $oldpass=$_POST['oldPass'];
    $newpass=$_POST['newPass'];
    $enternewpass=$_POST['enterNewPass'];
    if($pass==md5($oldpass)&&$pass!=md5($newpass)&&md5($newpass)==md5($enternewpass)){
        $this->model->changePassword($uid, $newpass);
        echo'
        <script>
        alert ("Đổi mật khẩu thành công, vui lòng đăng nhập lại !");
        window.location="?ctrl=login";
        </script>';
        unset($_SESSION['user']);
    } else {
        echo '
        <script>
        alert ("Đổi mật khẩu thất bại, vui lòng thực hiện lại !");
        history.back();
        </script>
        ';
    }
    }
}