<?php
require_once "models/model_binhluan.php";
class binhluan
{
    function __construct()
    {
        $this->model = new model_binhluan();
        $act = "binhluan";//chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
            case "binhluan":
                $this->binhluan();
                break;
            case "xoabinhluan":
                $this->xoabinhluan();
                break;

        }
        //$this->$act;
    }
    function binhluan(){
        $showAllComment=$this->model->getAllComment();
        $page_title = "Danh sách bình luận";
        $page_file = "views/binhluan/binhluan.php";
        require_once "layout.php";

    }
    function xoabinhluan(){
        $id = $_GET['id'];
        settype($id,"int");
        $this->model->deleteComment($id);
        header('Location:?ctrl=binhluan');
    }
}