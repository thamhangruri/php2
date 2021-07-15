<?php
require_once '../system/model_system.php';
class model_dienthoai extends model_system {
    function store($tenDT,$gia,$giaKM,$img,$moTa,$idNSX,$soLuongTonKho,$anHien){ //hàm lưu 1 record vào table
        $sql="insert into DienThoai(TenDT,Gia,GiaKM,urlHinh,MoTa,idNSX,SoLuongTonKho,AnHien) values ('$tenDT','$gia','$giaKM','$img','$moTa','$idNSX','$soLuongTonKho','$anHien')";
        $kq = $this->execute($sql);
        if(!$kq){
            return false;
        }else{
           return $this->conn->lastInsertId();
        }
    }
    function update($id,$tenDT,$gia,$giaKM,$img,$moTa,$idNSX,$soLuongTonKho,$anHien){ //hàm cập nhật 1 record vào table
        if(!$img=="") {
            $sql = "update DienThoai set TenDT='$tenDT',Gia='$gia',GiaKM='$giaKM',urlHinh='$img',MoTa='$moTa',idNSX='$idNSX',SoLuongTonKho='$soLuongTonKho',AnHien='$anHien' where idDT='$id'";
        }
        else{
            $sql = "update DienThoai set TenDT='$tenDT',Gia='$gia',GiaKM='$giaKM',MoTa='$moTa',idNSX='$idNSX',SoLuongTonKho='$soLuongTonKho',AnHien='$anHien' where idDT='$id'";
        }
        $this->execute($sql);
    }
    function storeTTDT($idDT,$manHinh,$heDieuHanh,$cameraSau,$cameraTruoc,$cpu,$ram,$boNhoTrong,$theNho,$theSim,$dungLuongPin){ //hàm lưu 1 record vào table
        $sql="insert into ThuocTinhDT(idDT,ManHinh,HeDieuHanh,CameraSau,CameraTruoc,CPU,RAM,BoNhoTrong,TheNho,TheSIM,DungLuongPin) 
                    values ('$idDT','$manHinh','$heDieuHanh','$cameraSau','$cameraTruoc','$cpu','$ram','$boNhoTrong','$theNho','$theSim','$dungLuongPin')";
        $this->execute($sql);
    }
    function updateTTDT($idDT,$manHinh,$heDieuHanh,$cameraSau,$cameraTruoc,$cpu,$ram,$boNhoTrong,$theNho,$theSim,$dungLuongPin){ //hàm cập nhật 1 record vào table
        $sql = "update ThuocTinhDT set ManHinh='$manHinh',HeDieuHanh='$heDieuHanh',CameraSau='$cameraSau',CameraTruoc='$cameraTruoc',
                       CPU='$cpu',RAM='$ram',BoNhoTrong='$boNhoTrong',TheNho='$theNho',TheSIM='$theSim',DungLuongPin='$dungLuongPin' 
                where idDT='$idDT'";
        $this->execute($sql);
    }
    function delete($id){  //hàm xóa 1 record khỏi table
        $sql="delete from DienThoai where idDT='$id'";
        $this->execute($sql);
    }
    function listrecords($start,$limit){ //hàm lấy các record trong table
        $sql="select * from DienThoai, NhaSanXuat where DienThoai.idNSX=NhaSanXuat.idNSX order by idDT limit $start,$limit";
        return $this->query($sql);
    }
    function thuoctinhdt($id){ //Thuộc tính sản phẩm(Nằm cùng với chi tiết SP)
        $sql = "SELECT * FROM ThuocTinhDT WHERE idDT='$id'";
        $kq= $this->queryOne($sql);
        return $kq;
    }
    function detailrecord($id){ //hàm lấy chi tiết 1 record trong table
        $sql="select * from DienThoai where idDT='$id'";
        $kq=$this->queryOne($sql);
        return $kq;
    }
    function countRecords(){ //Đếm record
        $sql="select count(idDT) as totalrecord from DienThoai";
        return $this->queryOne($sql);
    }

}//class