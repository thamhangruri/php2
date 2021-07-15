<?php
 require_once '../system/model_system.php';
 class model_nhasanxuat extends model_system {
     function store($tenNSX,$img,$thuTu,$anHien){ //hàm lưu 1 record vào table
         $sql="insert into NhaSanXuat(TenNSX,url_Hinh,ThuTu,AnHien) values ('$tenNSX','$img','$thuTu','$anHien')";
         $this->execute($sql);
     }
     function update($id,$tenNSX,$img,$thuTu,$anHien){ //hàm cập nhật 1 record vào table
         $sql="update NhaSanXuat set TenNSX='$tenNSX',url_Hinh='$img' ,ThuTu='$thuTu',AnHien='$anHien' where idNSX='$id'";
         $this->execute($sql);
     }
     function delete($id){  //hàm xóa 1 record khỏi table
         $sql="delete from NhaSanXuat where idNSX='$id'";
         $this->execute($sql);
     }
     function listrecords(){ //hàm lấy các record trong table
         $sql="select * from NhaSanXuat";
         return $this->query($sql);
     }
     function detailrecord($id){ //hàm lấy chi tiết 1 record trong table
         $sql="select * from NhaSanXuat where idNSX='$id'";
         $kq=$this->queryOne($sql);
         return $kq;
     }
 }//class
