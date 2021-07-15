<?php
    require_once "models/model_dienthoai.php";
    require_once "models/model_nhasanxuat.php"; //nạp model để có các hàm tương tác db
    class dienthoai{
        function __construct()   {
            $this->model = new model_dienthoai();
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
            $page_title = "Danh sách Điện thoại";
            $page_file = "views/dienthoai/index.php";
            $total=$this->model->countRecords();
            $limit=4;
            $current_page = isset($_GET['current_page']) ? $_GET['current_page'] : 1;
            $start=($current_page-1)*$limit;
            $list = $this->model->listrecords($start,$limit);
            require_once "layout.php";
            echo __METHOD__;
        }
        function addnew(){
            /*  Chức năng nạp view thêm record,
                1.Nạp form,form này phải có method="post",action của form => store */
            $page_title = "Thêm điện thoại";
            $page_file = "views/dienthoai/addnew.php";
            $this->model = new model_nhasanxuat();
            $tennsx = $this->model->listrecords();
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
            $tenDT = $_POST['TenDT'];
            $img = $_FILES['Hinh']['name'];
            $path="/opt/lampp/htdocs/PHP2/Asm/banhang/admin/Images/$img";
            $gia = $_POST['Gia'];
            $giaKM = $_POST['GiaKM'];
            $soLuongTonKho = $_POST['SoLuong'];
            $idNSX = $_POST['idNSX'];
            $moTa = $_POST['MoTa'];
            if (isset($_POST['AnHien'])){
                $anHien = '1';}
            else{
                $anHien='0';
            }
            $manHinh=$_POST['ManHinh'];
            $heDieuHanh=$_POST['HeDieuHanh'];
            $cameraSau=$_POST['CameraSau'];
            $cameraTruoc=$_POST['CameraTruoc'];
            $cpu=$_POST['CPU'];
            $ram=$_POST['RAM'];
            $boNhoTrong=$_POST['BoNhoTrong'];
            $theNho=$_POST['TheNho'];
            $theSim=$_POST['TheSim'];
            $dungLuongPin=$_POST['DungLuongPin'];
            if(move_uploaded_file($_FILES["Hinh"]["tmp_name"], $path)){
              $idDT=  $this->model->store($tenDT,$gia,$giaKM,$img,$moTa,$idNSX,$soLuongTonKho,$anHien);
                $this->model->storeTTDT($idDT,$manHinh,$heDieuHanh,$cameraSau,$cameraTruoc,$cpu,$ram,$boNhoTrong,$theNho,$theSim,$dungLuongPin);
                echo '
                    <script>
                        alert ("Thêm sản phẩm thành công")
                        window.location="?ctrl=dienthoai"
                    </script>
                    ';
            }
            else{
                echo '
                    <script>
                        alert ("Thêm sản phẩm không thành công")
                        window.location="?ctrl=dienthoai"
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
            $idDT = $_GET['idDT'];
            settype($idDT, "int");
            $row = $this->model->detailrecord($idDT);
            $tt = $this->model->thuoctinhdt($idDT);
            $page_title = "Cập nhật điện thoại";
            $page_file = "views/dienthoai/edit.php";
            $this->model = new model_nhasanxuat();
            $tennsx = $this->model->listrecords();
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
            $idDT = $_POST['idDT'];
            $tenDT = $_POST['TenDT'];
            $img = $_FILES['Hinh']['name'];
            $gia = $_POST['Gia'];
            $giaKM = $_POST['GiaKM'];
            $soLuongTonKho = $_POST['SoLuong'];
            $idNSX = $_POST['idNSX'];
            $moTa = $_POST['MoTa'];
            if (isset($_POST['AnHien'])){
                $anHien = '1';}
            else{
                $anHien='0';
            }
            $manHinh=$_POST['ManHinh'];
            $heDieuHanh=$_POST['HeDieuHanh'];
            $cameraSau=$_POST['CameraSau'];
            $cameraTruoc=$_POST['CameraTruoc'];
            $cpu=$_POST['CPU'];
            $ram=$_POST['RAM'];
            $boNhoTrong=$_POST['BoNhoTrong'];
            $theNho=$_POST['TheNho'];
            $theSim=$_POST['TheSim'];
            $dungLuongPin=$_POST['DungLuongPin'];
            if(!empty($_FILES)) {
                $path = "Images/.$img";
                move_uploaded_file($_FILES["Hinh"]["tmp_name"], $path);
                $this->model->update($idDT,$tenDT,$gia,$giaKM,$img,$moTa,$idNSX,$soLuongTonKho,$anHien);
                $this->model->updateTTDT($idDT,$manHinh,$heDieuHanh,$cameraSau,$cameraTruoc,$cpu,$ram,$boNhoTrong,$theNho,$theSim,$dungLuongPin);
                echo '
                    <script>
                        alert("Cập nhật sản phẩm thành công")
                        window.location="?ctrl=dienthoai"
                    </script>
                    '  ;
            }
            else{
                echo '
                    <script>
                        alert("Cập nhật sản phẩm thành công")
                        window.location="?ctrl=dienthoai"
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
            $id = $_GET['idDT'];
            settype($id,"int");
            $row = $this->model->delete($id);
            header("location:?ctrl=dienthoai");
            echo __METHOD__;
        }
    }