<?php
require_once '../system/model_system.php';

class model_home extends model_system
{
    function fetchSP($idNSX = 0)
    { //Đếm xem có hàng nào trong bảng hay không?
        $sql = "SELECT * FROM DienThoai WHERE AnHien=1 AND idNSX='$idNSX' ORDER BY ThoiDiemNhap DESC"; //đếm hàng theo dk này
        $kq = $this->fetchRow($sql);
        return $kq; //trả về số hàng
    }

    function fetchNSXBySlug($slug)
    { // Lấy nhà sản xuất bởi slug.
        $sql = "SELECT * FROM NhaSanXuat WHERE AnHien=1 AND slug='{$slug}' LIMIT 1";
        $kq = $this->queryOne($sql);
        return $kq;    
    }

    function fetchNSXDefault()
    { // Lấy nhà sản xuat mac dinh.
        $sql = "SELECT * FROM NhaSanXuat WHERE AnHien=1 ORDER BY idNSX ASC LIMIT 1";
        $kq = $this->queryOne($sql);
        return $kq;
    }

    function catalog()
    { //Hiển thị nhà sản xuất
        $sql = "select * from NhaSanXuat where AnHien = 1";
        return $this->query($sql);
    }

    function sanphamtheoNSX($idNSX)
    { //Sản phẩm theo id NSX
        $sql = "SELECT * FROM DienThoai WHERE AnHien=1 AND idNSX='$idNSX' ORDER BY ThoiDiemNhap DESC";
        $kq = $this->query($sql);
        return $kq;
    }

    function sanphamMoi()
    { //Hiển thị sản phẩm mới
        $sql = "SELECT * FROM DienThoai WHERE AnHien=1 ORDER BY ThoiDiemNhap DESC LIMIT 0,3";
        $kq = $this->query($sql);
        return $kq;
    }

    function getAllProduct($start, $limit)
    { //Hiển thị toàn bộ sản phẩm
        $sql = "select * from DienThoai where AnHien=1 order by idDT limit $start,$limit";
        return $this->query($sql);
    }

    function sanphamHot()
    { //Sản phẩm hot
        $sql = "SELECT * FROM DienThoai WHERE Hot=1 ORDER BY ThoiDiemNhap DESC LIMIT 0,3";
        $kq = $this->query($sql);
        return $kq;
    }

    function sanphamBestSell()
    { //Sản phẩm bán chạy
        $sql = "SELECT * FROM DienThoai WHERE AnHien=1 ORDER BY SoLanMua DESC LIMIT 0,3";
        $kq = $this->query($sql);
        return $kq;
    }
    function fetchDTBySlug($slug)
    { // Lấy dt bởi slug.
        $sql = "SELECT * FROM DienThoai WHERE AnHien=1 AND slug='{$slug}'";
        $kq = $this->queryOne($sql);
        return $kq;
    }
    function detail($id)
    { // Chi tiết sản phẩm
        $sql = "SELECT * FROM DienThoai WHERE AnHien=1 AND idDT='$id'";
        $kq = $this->query($sql);
        if (!$kq) return FALSE;
        $row = $kq->fetch();
        return $row;
    }

    function thuoctinhdt($id)
    { //Thuộc tính sản phẩm(Nằm cùng với chi tiết SP)
        $sql = "SELECT * FROM ThuocTinhDT WHERE idDT='$id'";
        $kq = $this->query($sql);
        if (!$kq) return FALSE;
        $row = $kq->fetch();
        return $row;
    }

    function view($id)
    { //Tăng lượt xem
        $sql = "update DienThoai set SoLanXem=soLanXem+1 where idDT='$id'";
        return $this->execute($sql);
    }

    function listrecords($start, $limit)
    { //hàm lấy các record trong table
        $sql = "select * from DienThoai, NhaSanXuat where DienThoai.idNSX=NhaSanXuat.idNSX limit $start,$limit";
        return $this->query($sql);
    }

    function listrecordsCat($idNSX, $start, $limit)
    { //hàm lấy các record trong table
        $sql = "select * from DienThoai where idNSX ='$idNSX' limit $start,$limit";
        return $this->query($sql);
    }

    function countCat($idNSX)
    { //Đếm record
        $sql = "select count(idDT) as totalrecord from DienThoai where idNSX ='$idNSX'";
        return $this->queryOne($sql);
    }

    function countRecords()
    { //Đếm record
        $sql = "select count(idDT) as totalrecord from DienThoai";
        return $this->queryOne($sql);
    }

    function luudonhangnhe($idDH, $hoten, $email, $diachi, $sdt, $idUser, $ghichukh, $ptgh, $pttt)
    {
        //Lưu đơn hàng
        if ($idDH == -1) {
            $sql = "INSERT INTO DonHang (TenNguoiNhan,EmailNguoiNhan,DiaChiNguoiNhan,ThoiDiemDatHang,AnHien,SDT,idUsers,GhiChuCuaKhach,PhuongThucGiaoHang,PhuongThucThanhToan) VALUES ('$hoten','$email','$diachi',Now(),1
                    ,'$sdt','$idUser','$ghichukh','$ptgh','$pttt')";
            $kq = $this->execute($sql);
            if (!kq) return FASLSE;
            else return $this->conn->lastInsertId();
        } else {
            $sql = "UPDATE DonHang SET TenNguoiNhan='$hoten', EmailNguoiNhan='$email',DiaChiNguoiNhan='$diachi',ThoiDiemDatHang=Now(),idUsers='$idUser', AnHien=1
                    ,SDT='$sdt', GhiChuCuaKhach='$ghichukh',PhuongThucGiaoHang='$ptgh',PhuongThucThanhToan='$pttt' where idDH=$idDH";
            $kq = $this->execute($sql);
            if (!kq) return FASLSE;
            else return $idDH;
        }
    }//function luudonhangnhe

    function luugiohangnhe($idDH, $giohang)
    { //Lưu giỏ hàng

        foreach ($giohang as $idDT => $dt) {
            $tenDT = $dt['TenDT'];
            $gia = $dt['Gia'];
            $Amount = $dt['Amount'];
            $sql = "INSERT INTO DonHangChiTiet (idDH,idDT,TenDT,Gia,SoLuong) VALUES ('$idDH','$idDT','$tenDT','$gia','$Amount')";
            $this->execute($sql);
        }//foreach
    }

    function getAllComment($id)
    {
        $sql = "select * from BinhLuan where idDT=$id";
        return $this->query($sql);
    }

    function getUserOfBL($idUser)
    {
        $sql = "select urlHinh from Users where idUsers = $idUser";
        return $this->queryOne($sql);
    }

    function addComment($uid, $idsp, $cmt, $time)
    { //them cmt
        $sql = "insert into BinhLuan(idUsers,idDT, NoiDungBL, ThoiDiemBL) 
        values ('$uid','$idsp', '$cmt', '$time')";
        $this->execute($sql);
    }

    function getAllCustomer()
    {
        $sql = "select * from Users";
        return $this->query($sql);
    }

    function commentChange($id, $cmt, $time)
    { //sua cmt
        $sql = "update BinhLuan set NoiDungBL='$cmt', ThoiDiemBL='$time' where idBL=$id";
        $this->execute($sql);
    }

    function deleteComment($id)
    { //xoa cmt
        $sql = "delete from BinhLuan where idBL=$id";
        $this->execute($sql);
    }

    function getOrder($idUser)
    {
        $sql = "select * from DonHang where idUsers=$idUser";
        return $this->query($sql);
    }

    function getOrderDetail($idDH)
    {
        $sql = "select * from DonHangChiTiet  where idDH=$idDH";
        return $this->query($sql);
    }

    function deletedh($id)
    {
        $sql = "delete from DonHang where idDH='$id'";
        $this->execute($sql);
    }

    function sendMail($email)
    {
        $thongbao = '';
        require_once "./PHPMailer-master/src/PHPMailer.php";
        require_once "./PHPMailer-master/src/Exception.php";
        require_once "./PHPMailer-master/src/OAuth.php";
        require_once "./PHPMailer-master/src/SMTP.php";
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->SMTPDebug = 0;   //chế độ full debug, khi mọi thứ ok thì chỉnh lại 0
            $mail->isSMTP();       // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Server gửi thư
            $mail->SMTPAuth = true;
            $mail->Username = 'phpmailerbanhangphp2@gmail.com';  // ví dụ: abc@gmail.com
            $mail->Password = 'Thamhang123';
            $mail->SMTPSecure = 'ssl'; //TLS hoặc `ssl`
            $mail->Port = 465;    // 587 hoặc 465
            $mail->CharSet = "UTF-8";
            $mail->smtpConnect(["ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                ]
                ]
            );
            //Khai báo người gửi và người nhận mail
            $mail->setFrom('phpmailerbanhangphp2@gmail.com', 'RuriPhone');
            $mail->addAddress("{$email}", 'Quý khách');
            $mail->isHTML(true);  // nội dung của email có mã HTML
            $mail->Subject = 'Xin Cảm Ơn Quý Khách !';
            $mail->Body = '<div style="width: 700px; height: 30px; background-color: #35738e; color: white;font-family:Roboto,RobotoDraft,Helvetica,Arial,sans-serif;padding: 40px;"> 
    <h2 style="text-align: center;margin-block-end: 0;margin-block-start: 0;">CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT HÀNG TẠI RURI PHONE</h2>
</div>
<div>
    <h3>Để xem lại đơn hàng và chi tiết đơn hàng. Quý khách vui lòng truy cập vào <a href="#">Webstie của Ruri Phone</a> sau đó<span style="color: #35738e;"> đăng nhập </span> và chọn<span style="color: #35738e;"> xem đơn hàng </span>.</h3>
</div>';
            $mail->send();
            echo '
                    <script type="text/javascript">
                    alert ("Đặt hàng thành công, vui lòng kiểm tra email !");
                    window.location="?ctrl=home"
                    </script>
                    ';
        } catch (Exception $e) {
            $thongbao .= "Lỗi khi gửi thư: " . $mail->ErrorInfo;
            echo '
                <script type="text/javascript">
                alert ("Gửi mail thất bại ' . $mail->ErrorInfo . '");
                history.back();
                </script>
                ';
        }

    }


}//class