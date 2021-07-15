<?php
 require_once '../system/model_system.php';
 class model_users extends model_system {
     function store($username,$password,$hoten,$Hinh,$email,$anHien){ //hàm lưu 1 record vào table
         $sql="insert into Users(Username,Password,HoTen,urlHinh,Email,AnHien) values ('$username',MD5('$password'),'$hoten','$Hinh','$email','$anHien')";
         $this->execute($sql);
     }
     function update($id,$hoten,$Hinh,$email,$anHien){ //hàm cập nhật 1 record vào table
         $sql="update Users set HoTen='$hoten',urlHinh='$Hinh',Email='$email',AnHien='$anHien' where idUsers='$id'";
         $this->execute($sql);
     }
     function delete($id){  //hàm xóa 1 record khỏi table
         $sql="delete from Users where idUsers='$id'";
         $this->execute($sql);
     }
     function listrecords(){ //hàm lấy các record trong table
         $sql="select * from Users";
         return $this->query($sql);
     }
     function detailrecord($id){ //hàm lấy chi tiết 1 record trong table
         $sql="select * from Users where idUsers='$id'";
         $kq=$this->queryOne($sql);
         return $kq;
     }
 }
