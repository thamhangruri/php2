<?php

class model_login extends model_system{
    function login($username,$password){
        $sql="select * from Users where Username='$username' and Password='$password' and VaiTro=1";
        echo $sql;
        return $this->queryOne($sql);
    }
}
