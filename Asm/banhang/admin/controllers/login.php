<?php
require_once "../../system/config.php";
require_once "../../system/model_system.php";
require_once "../models/model_login.php";

class login
{
    function __construct()
    {
        $this->model = new model_login();
        $act = "login";//chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
            case "login":
                $this->login();
                break;
            case "logout":
                $this->logout();
                break;
        }
        //$this->$act;
    }

    function login()
    {

        /*  Chức năng đăng nhập */
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $check = $this->model->login($username, md5($password));

            if (is_array($check)) {
                if (!isset($_SESSION["admin"])) {
                    $_SESSION['admin']['username'] = $check['Username'];
                    $_SESSION['admin']['role'] = $check['VaiTro'];
                    $_SESSION['admin']['uid'] = $check['idUsers'];
                    $_SESSION['admin']['name'] = $check['HoTen'];
                    $_SESSION['admin']['image'] = $check['urlHinh'];
                }
                    header('location: ../../admin/');
            }
        }
        require_once "../views/login.php";
        echo __METHOD__;
    }

    function logout()
    {
        unset($_SESSION["admin"]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}

new login();
