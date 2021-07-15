<?php
require_once '../system/model_system.php';
class model_donhang extends model_system {
    function GetAllCart(){
        $sql = "SELECT * FROM DonHang ORDER BY idDH DESC";
        return $this->query($sql);
    }

    function GetDetailCartById($id){
        $sql="select * from DonHangChiTiet, DonHang
            where  DonHangChiTiet.idDH=DonHang.idDH and DonHangChiTiet.idDH=$id";
        return $this->query($sql);
    }
    function confirm($id){
        $sql="update DonHang set TrangThai=1 where idDH=$id";
        $this->execute($sql);
    }
    function deletedh($id){
        $sql="delete from DonHang where idDH='$id'";
        $this->execute($sql);
    }
}