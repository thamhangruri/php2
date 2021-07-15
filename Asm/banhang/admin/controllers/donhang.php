<?php
require_once "models/model_donhang.php";
class donhang{
    function __construct()
    {
        $this->model = new model_donhang();
        $act = "donhang";//chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
            case "donhang":
                $this->donhang();
                break;
            case "chitietdonhang":
                $this->chitietdonhang();
                break;
            case "xacnhandonhang":
                $this->xacnhandonhang();
                break;
            case "xoadonhang":
                $this->xoadonhang();
                break;

        }
        //$this->$act;
    }
    function donhang(){
        $cart = $this->model->GetAllCart();
        $page_title = "Danh sách đơn hàng";
        $page_file = "views/donhang/donhang.php";
        require_once "layout.php";
    }
    function chitietdonhang(){
        $id =$_GET['id'];
        $getDetail = $this->model->GetDetailCartById($id);
        $page_title = "Chi tiết đơn hàng";
        $page_file = "views/donhang/chitietdonhang.php";
        require_once "layout.php";
    }
    function xacnhandonhang(){
        $id=$_GET['id'];
        $this->model->confirm($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    function xoadonhang(){
        $id=$_GET['id'];
        $this->model->deletedh($id);
        header('Location:?ctrl=donhang');
    }
}