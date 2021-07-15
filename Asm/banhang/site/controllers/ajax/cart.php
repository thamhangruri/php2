<?php
$array = array();

session_start();
$idsp = $_POST['id'];
$qty = $_POST['qty'];

   $_SESSION['giohang'][$idsp]['Amount'] = $qty;
$num= $_SESSION['giohang'][$idsp]['Amount'];
    $sub_total = $_SESSION['giohang'][$idsp]['Gia']*$num;
updateInforCart();
$total = $_SESSION['infor']['total'];
$array = [
    'num'=> $num,
    'sub_total'=> $sub_total,
    'total' => $total,
];
echo json_encode($array);


function updateInforCart(){
    if( isset($_SESSION['giohang'])){
        $count = 0;
        $total = 0;
        foreach ($_SESSION['giohang'] as $item){
            $count += $item['Amount'];
            $total += $item['Gia']*$item['Amount'];

        }
        $_SESSION['infor']= array(
            'count' => $count,
            'total'  => $total,
        );
    }else{
        $_SESSION['infor']= array(
            'count' => 0,
            'total'  => 0,
        );
    }
}
?>