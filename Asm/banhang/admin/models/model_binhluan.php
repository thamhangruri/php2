<?php
require_once '../system/model_system.php';
class model_binhluan extends model_system
{
    function getAllComment()
    {
        $sql = "select * from BinhLuan";
        return $this->query($sql);
    }

    function deleteComment($id)
    {
        $sql = "delete from BinhLuan where idBL=$id";
        $this->execute($sql);
    }
}