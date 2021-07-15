<?php
require_once '../system/model_system.php';
class model_search extends model_system
{
    function search($keyword, $start, $limit){
        $sql="select * from DienThoai inner join NhaSanXuat
        ON DienThoai.idNSX= NhaSanXuat.idNSX
        where TenNSX like '%$keyword%' OR TenDT like '%$keyword%' 
        OR Gia like '%$keyword%' 
        OR concat(TenNSX,' ',Gia) like '%$keyword%'
        OR concat(TenNSX,' ',TenDT) like '%$keyword%'
        OR concat(TenDT,' ',Gia) like '%$keyword%'
         limit $start, $limit;
        ";
        return $this->query($sql);
    }
    function countTotalSearch($keyword){
        $sql="select count(idDT) as totalrecord from DienThoai inner join NhaSanXuat
        ON DienThoai.idNSX= NhaSanXuat.idNSX
        where TenNSX like '%$keyword%' OR TenDT like '%$keyword%' 
        OR Gia like '%$keyword%' 
        OR concat(TenNSX,' ',Gia) like '%$keyword%'
        OR concat(TenNSX,' ',TenDT) like '%$keyword%'
        OR concat(TenDT,' ',Gia) like '%$keyword%'
         ";
        return $this->queryOne($sql);
    }
}