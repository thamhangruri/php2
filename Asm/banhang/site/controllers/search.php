<?php
require_once "models/model_search.php"; //nạp model để có các hàm tương tác db
class search
{
    function __construct()
    {
        $this->model = new model_search();
        $act = "search";//chức năng mặc định
        if (isset($_GET["act"]) == true) $act = $_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
            case "search":
                $this->search();
                break;
        }
        //$this->$act;
    }
    function search(){
        $timkiem='Tìm kiếm';
        $keyword=trim(strip_tags($_GET['search']));
        $total=$this->model->countTotalSearch($keyword);
        $limit=6;
        $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
        $start=($current_page-1)*$limit;
        $product=$this->model->search($keyword, $start, $limit);
        $viewFile = "views/search.php";
        require_once "layout.php";
    }
}
