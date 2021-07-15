<?php
require_once "models/model_home.php"; //nạp model để có các hàm tương tác db
class home {
    function __construct()   {
        $this->model = new model_home();
        $act = "home";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//chức năng user request
        switch ($act) {
            case "home": $this->home(); break;
            case "allproducts": $this->allproduct(); break;
            case "detail": $this->detail(); break;
            case "cat": $this->cat(); break;
            case "cart": $this->cart(); break;
            case "cartview": $this->cartview(); break;
            case "xoagiohang": $this->xoagiohang(); break;
            case "thanhtoan": $this->thanhtoan(); break;
            case "luudonhang": $this->luudonhang(); break;
            case "comment": $this->cmt(); break;
            case "suacomment": $this->suacmt(); break;
            case "deletecmt": $this->xoacmt(); break;
            case "update": $this->updateCart(); break;
            case "xemdonhang": $this->xemdonhang(); break;
            case "donhangchitiet": $this->donhangchitiet(); break;
        }
        //$this->$act;
    }
    function home(){
        /*  Chức năng trang chủ
        1. Gọi các hàm trong model lấy dữ liệu cần thiết
        2. Nạp view
        */
        $listSPMoi = $this->model->sanphamMoi();
        $listSPHot = $this->model->sanphamHot();
        $listSPSell = $this->model->sanphamBestSell();
        $viewFile = "views/home.php";
        require_once "layout.php";
        echo __METHOD__;
    }
    function allproduct(){
        /*  Chức năng trang chủ
        1. Gọi các hàm trong model lấy dữ liệu cần thiết
        2. Nạp view
        */
        $total=$this->model->countRecords();
        $limit=6;
        $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
        $start=($current_page-1)*$limit;
        $allproducts=$this->model->getAllProduct($start,$limit);
        $viewFile = "views/allproducts.php";
        require_once "layout.php";
        echo __METHOD__;
    }
    function detail(){
        /*  Chức năng hiện chi tiết sản phẩm,
           1. Tiếp nhận tham số
           2. Gọi hàm trong model để lấy chi tiết sản phẩm từ db
           3.Nạp view
        */
        $slugDT = $_GET['slug'];
        $dt =  $this->model->fetchDTBySlug($slugDT);

//        if($dt==FALSE) {
//            header("location: ". SITE_URL."/thongbao");
//            exit();
//        }

        $id = (int) @$dt['idDT'];
        $this->model->view($id);
        settype($id, "int");
        $sp = $this->model->detail($id);
        $thuoctinh = $this->model->thuoctinhdt($id);
        $spHot = $this->model->sanphamHot($id);
        $comment = $this->model->getAllComment($id);
//        if($sp==FALSE) {
//            header("location: ". SITE_URL."/thongbao");
//            exit();
//        }
        $viewFile = "views/detail.php";
        require_once "layout.php";
    echo __METHOD__;
    }
    function cat(){
        /* Chức năng hiện các sản phẩm theo loại (nhà sản xuất)
         1. Tiếp nhận tham số id
         2. Gọi hàm tromg model lấy dữ liệu
         3. Nạp view
         */
        $slugNSX = $_GET['slug'];
        $nsx = $this->model->fetchNSXBySlug($slugNSX);
        
        if($nsx==FALSE) {
            $nsx = $this->model->fetchNSXDefault();
        }

        $idNSX = (int) @$nsx['idNSX'];
        $listSP = $this->model->sanphamtheoNSX($idNSX);
        $countSP = $this->model->fetchSP($idNSX);
        $catalog = $this->model->catalog();
        $total=$this->model->countCat($idNSX);
        $limit=3;
        $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
        $start=($current_page-1)*$limit;
        $list = $this->model->listrecordsCat($idNSX,$start,$limit);
        if($listSP==FALSE) {
            header("location: ". SITE_URL."/thongbao");
            exit();
        }
        $viewFile = "views/cat.php";
        require_once "layout.php";
        echo __METHOD__;
    }
    function cart(){
        //Tiếp nhận biến id (mã sản phẩm) và what (để biết thêm/xóa sp)
        $id = $_GET['id'];  settype($id, "int");
        $what ="add"; if(isset($_GET['what'])) $what = $_GET['what'];
        if ($what=="add"){
            if (isset($_SESSION['giohang'])==false) $_SESSION['giohang']=[]; //tạo mảng rổng nếu chưa có
            $spFromDB = $this->model->detail($id);  //if ($spFromDB==null) ...
            $spInCart = $_SESSION['giohang'][$id]; //['TenDT'=>'A','Amount'=>2]
            if ($spInCart!=null) $soluong=$spInCart['Amount']+1;
            else $soluong = 1;
            $_SESSION['giohang'][$id]=[
                'idDT' => $spFromDB['idDT'],
                'TenDT'=>$spFromDB['TenDT'],
                'urlHinh'=>$spFromDB['urlHinh'],
                'Gia'=>$spFromDB['Gia'],
                'Amount' =>$soluong,
                'soluongtonkho' =>$spFromDB['SoLuongTonKho']
            ];
        }//if what=="add"
        if ($what=="remove"){
            unset($_SESSION['giohang'][$id]);
        }//$what=="remove"
        $this->updateInforCart();
        header("location:/PHP2/Asm/banhang/gio-hang/");
    }//function cart
    function updateInforCart(){
        if( isset($_SESSION['giohang'])){
            $count = 0;
            $total = 0;
            foreach ($_SESSION['giohang'] as $item){
                $count += $item['Amount'];
                $total += $item['Gia']*$item['Amount'];

        }
            $_SESSION['infor']= array(
                'count' => $count,
                'total'  => $total,
            );
        }else{
            $_SESSION['infor']= array(
                'count' => 0,
                'total'  => 0,
            );
        }
    }
    function updateCart(){
       $number_order = $_POST['quantity'];
       foreach ($number_order as $id => $qty){
           $_SESSION['giohang'][$id]['Amount'] = $qty;
       }
       $this->updateInforCart();
        header("location:/PHP2/Asm/banhang/gio-hang/");
    }
    function cartview(){ //Hiển thị giỏ hàng
        if($_SESSION['infor']['count']==0){
            echo '<script>alert("Giỏ hàng chưa có sản phẩm nào! Vui lòng chọn sản phẩm !");history.back();</script>';
        }else{
            $viewFile = "views/cartview.php";
            require_once "layout.php";
        }

        echo __METHOD__;
    }
    function xoagiohang(){
        unset($_SESSION['giohang']);
            $this->updateInforCart();
        header("location:?ctrl=home");
    }
    function thanhtoan(){ //Thanh toán
        $viewFile = "views/thanhtoan.php";
        require_once "layout.php";
        echo __METHOD__;
    }
    function luudonhang(){ // Lưu đơn hàng
        $idUser=$_SESSION['user']['uid'];
        $hoten = trim(strip_tags($_POST['HoTen']));
        $email = trim(strip_tags($_POST['Email']));
        $diachi = trim(strip_tags($_POST['DiaChi']));
        $sdt = trim(strip_tags($_POST['Sdt']));
        $ghichukh = trim(strip_tags($_POST['GhiChu']));
        $ptgh = trim(strip_tags($_POST['phuongthucgh']));
        $pttt = trim(strip_tags($_POST['phuongthuctt']));
        if (isset($_SESSION['idDH'])) $idDH= $_SESSION['idDH']; else $idDH="-1";
        $idDH = $this->model->luudonhangnhe($idDH, $hoten, $email,$diachi,$sdt,$idUser,$ghichukh,$ptgh,$pttt);
        $this->model->sendMail($email);
        if ($idDH){
            $_SESSION['idDH'] = $idDH;
            unset($_SESSION['idDH']);
            $this->model->luugiohangnhe($idDH, $_SESSION['giohang']);
            unset($_SESSION['giohang']);
            $this->updateInforCart();
            header("location:?ctrl=home");
        }//if ($idDH)
    }//function luudonhang
    function cmt(){
        $uid=$_GET['uid'];
        $cmt= $_POST['cmt'];
        $time=date('Y-m-d H:i:s');
        $idsp=$_GET['idsp'];
        if(isset($_SESSION['user'])){
            $this->model->addComment($uid,$idsp,$cmt, $time);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        else {
            echo 'Vui lòng Đăng nhập để bình luận';
        }
    }//cmt
    function suacmt(){
        $id=$_GET['id'];
        $cmt=$_POST['suacmt'];
        $time=date('Y-m-d H:i:s');
        $this->model->commentChange($id,$cmt,$time);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }//suacmt
    function xoacmt(){
        $id=$_GET['id'];
        $this->model->deleteComment($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }//xoacmt
    function xemdonhang(){
        $cart = $this->model->getOrder($_SESSION['user']['uid']);
        $viewFile = "views/xemdonhang.php";
    require_once "layout.php";
    }
    function donhangchitiet(){
        $idDH=$_GET['id'];
        $getDetail = $this->model->getOrderDetail($idDH);
        $viewFile = "views/donhangchitiet.php";
        require_once "layout.php";
    }
    function xoadonhang(){
        $id=$_GET['id'];
        $this->model->deletedh($id);
        header('Location:?ctrl=donhang');
    }

} //class home
