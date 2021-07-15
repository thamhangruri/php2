<?php
require_once '../system/model_system.php';
class model_login extends model_system
{
    function registerUser($name, $email, $password)
    {
        $sql = "insert into Users(name, email, password)
                values ('$name','$email',MD5('$password'))";
        $this->execute($sql);
    }

    function login($username, $password)
    {
        $sql = "select * from Users where Username='$username' and Password=md5('$password')";
        return $this->query($sql);

    }

    function registerCustomer($username,$password,$hoten,$diachi,$Hinh,$email,$anHien){ //hàm lưu 1 record vào table
        $sql="insert into Users(Username,Password,HoTen,diaChi,urlHinh,Email,AnHien) values ('$username',MD5('$password'),'$hoten','$diachi','$Hinh','$email','$anHien')";
        $this->execute($sql);
    }

    function getCustomerById($uid)
    {
        $sql = "select * from Users where idUsers='$uid'";
        return $this->queryOne($sql);
    }

    function changeInfoCustomer($uid, $name, $sdt, $email, $address)
    {
        $sql = "update nguoidung set tenND='$name', sdt='$sdt',email='$email', diaChi='$address' where maND=$uid";
        $this->execute($sql);
    }

    function changePassword($uid, $newpass)
    {
        $sql = "update Users set Password=md5('$newpass') where idUsers='$uid'";
        $this->execute($sql);
    }

    function checkExistEmail($email)
    {
        $sql = "select Email from Users where Email='$email'";
        return $this->queryOne($sql);
    }

    function checkExistUsername($username)
    {
        $sql = "select Username from Users where Username='$username'";
        return $this->queryOne($sql);
    }

    function changePasswordForgot($email, $pass_moi)
    {
        $sql = "update Users set Password='$pass_moi' where Email='$email' ";
        $this->execute($sql);
    }
    function sendMail($email,$pass){
        $thongbao='';
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
            $mail -> CharSet = "UTF-8";
            $mail->smtpConnect([ "ssl" => [
                    "verify_peer"=>false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                ]
                ]
            );
            //Khai báo người gửi và người nhận mail
            $mail->setFrom('phpmailerbanhangphp2@gmail.com', 'RuriPhone');
            $mail->addAddress("{$email}", 'Quý khách');
            $mail->isHTML(true);  // nội dung của email có mã HTML
            $mail->Subject = 'Cấp lại mật khẩu mới';
            $mail->Body = "Chào bạn ! RuriPhone cấp lại mật khẩu mới cho bạn. <br> Đây là mật khẩu mới của bạn <b> {$pass} </b>. <br> Vui lòng dùng mật khẩu mới để dăng nhập lại và đổi mật khẩu của bạn.";
            $mail->send();
            echo '
                    <script type="text/javascript">
                    alert ("Đổi mật khẩu thành công, vui lòng kiểm tra email !");
                    window.location="?ctrl=login"
                    </script>
                    ';
        } catch (Exception $e) {
            $thongbao .= "Lỗi khi gửi thư: " . $mail->ErrorInfo;
            echo '
                <script type="text/javascript">
                alert ("Gửi mail thất bại '.$mail ->ErrorInfo.'");
                history.back();
                </script>
                ';
        }

    }
}//login
