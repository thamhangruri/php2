<?php
require_once "models/model_nhasanxuat.php"; //nạp model để có các hàm tương tác db
class nhasanxuat {
    function __construct()   {
        $this->model = new model_nhasanxuat();
        $act = "index";//chức năng mặc định
        if(isset($_GET["act"])==true) $act=$_GET["act"];//tiếp nhận chức năng user request
        switch ($act) {
            case "index": $this->index(); break;
            case "addnew": $this->addnew(); break;
            case "store": $this->store(); break;
            case "edit": $this->edit(); break;
            case "update": $this->update(); break;
            case "delete": $this->delete(); break;
        }
        //$this->$act;
    }
    function index(){
        /*  Chức năng hiện danh sách record trong table
            1. Gọi hàm trong model lấy tất các các record từ db
            2. Nạp view hiện danh sách các record vừa lấy*/
        $list = $this->model->listrecords();
        $page_title = "Danh sách nhà sản xuất";
        $page_file = "views/nhasanxuat/nhasanxuat_index.php";
        require_once "layout.php";
        echo __METHOD__;
    }
    function addnew(){
        /*  Chức năng nạp view thêm record,
            1.Nạp form,form này phải có method="post",action của form => store */
        $page_title = "Thêm nhà sản xuất";
        $page_file = "views/nhasanxuat/nhasanxuat_addnew.php";
        require_once "layout.php";
    echo __METHOD__;
    }
     function store(){
         /* Đây là chức năng tiếp nhận dữ liệu từ form addnew (method POST)
           1. Tiếp nhận các giá trị từ form addnew
           2. Kiểm tra hợp lệ các giá trị nhận được
           3. Gọi hàm chèn vào db
           4. Tạo thông báo
           5. Chuyển hướng đến trang cần thiết*/
         $tenNSX = $_POST['TenNSX'];
         $thuTu = $_POST['ThuTu'];
         $img = $_FILES['Hinh']['name'];
         $path="Images/.$img";
         if (isset($_POST['AnHien'])){
            $anHien = '1';}
         else{
             $anHien='0';
         }
         if(move_uploaded_file($_FILES["Hinh"]["tmp_name"], $path)){
             $this->model->store($tenNSX,$img,$thuTu,$anHien);
             echo '
                    <script>
                        alert ("Thêm nhà sản xuất thành công")
                        window.location="?ctrl=nhasanxuat"
                    </script>
                    ';
         }
         else{
             echo '
                    <script>
                        alert ("Thêm nhà sản xuất không thành công")
                        window.location="?ctrl=nhasanxuat"
                    </script>
                    ';
         }

         echo __METHOD__;
     }
     function edit(){
         /* Chức năng hiện form edit 1 record
           1. Tiếp nhận biến id của record cần chỉnh (ma_hh, ma_loai,...)
           2. Kiểm tra hợp lệ giá trị id
           3. Gọi hàm lấy record cần chỉnh (1 record)
           4. Nạp form chỉnh, trong form hiện thông tin của record,
           5. Form này cũng phải có method là Post, action trỏ lên act update*/
         $idNSX = $_GET['idNSX'];
         settype($idNSX, "int");
         $row = $this->model->detailrecord($idNSX);
         $page_title = "Cập nhật nhà sản xuất";
         $page_file = "views/nhasanxuat/nhasanxuat_edit.php";
         require_once "layout.php";
         echo __METHOD__;
     }
     function update(){
         /* Đây là chức năng tiếp nhận dữ liệu từ form edit (method POST)
          1. Tiếp nhận các giá trị từ form edit
          2. Kiểm tra hợp lệ các giá trị nhận được
          3. Gọi hàm cập nhật vào db
          4. Tạo thông báo
          5. Chuyển hướng đến trang cần thiết */
         $id = $_POST['idNSX'];
         $tenNSX = $_POST['tenNSX'];
         $thuTu = $_POST['thuTu'];
         $img = $_FILES['Hinh']['name'];
         if (isset($_POST['anHien'])){
             $anHien = '1';}
         else{
             $anHien='0';
         }
         if(!empty($_FILES)) {
             $path = "Images/.$img";
             move_uploaded_file($_FILES["Hinh"]["tmp_name"], $path);
             $this->model->update($id,$tenNSX,$img,$thuTu,$anHien);
             echo '
                    <script>
                        alert("Cập nhật nhà sản xuất thành công")
                        window.location="?ctrl=nhasanxuat"
                    </script>
                    '  ;
         }
         else{
             echo '
                    <script>
                        alert("Cập nhật sản phẩm thành công")
                        window.location="?ctrl=nhasanxuat"
                    </script>
                    '  ;
         }
         echo __METHOD__;
     }
     function delete(){
         /* Chức năng xóa record
          1. Tiếp nhận biến id của record cần xóa
          2. Gọi hàm xóa
          3. Tạo thông báo
          4. Chuyển đến trang cần thiết*/
         $idNSX = $_GET['idNSX'];
         settype($idNSX,"int");
         $row = $this->model->delete($idNSX);
         header("location:?ctrl=nhasanxuat");
         echo __METHOD__;
     }
 } //class nhasanxuat
