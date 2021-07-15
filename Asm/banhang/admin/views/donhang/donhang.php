<table class="table">
    <thead style="background-color: #35738e;color: #fffcfc;">
    <tr class="text-center">
        <th scope="col">Id</th>
        <th scope="col">Tên KH</th>
        <th scope="col">SDT</th>
        <th scope="col">Ghi chú KH</th>
        <th scope="col">PT Thanh toán</th>
        <th scope="col">PT Giao hàng</th>
        <th scope="col">Trạng thái</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
<?php
foreach ($cart as $value) {
    echo'
    <tr class="text-center">
        <th>'.$value['idDH'].'</th>
        <td>'.$value['TenNguoiNhan'].'</td>
        <td>'.$value['SDT'].'</td>
        <td>'.$value['GhiChuCuaKhach'].'</td>
        <td>'.$value['PhuongThucThanhToan'].'</td>
        <td>'.$value['PhuongThucGiaoHang'].'</td>
        ';
    if($value['TrangThai']>0){
        echo '<td>Đã giao</td>';
    }
    else echo '<td>Đang giao</td>';
    echo'
          <td>
            <a class="btn" style="background-color: #0f74a8;color: white" href="?ctrl=donhang&act=xacnhandonhang&id='.$value['idDH'].'">Xác nhận</a>
            <a class="btn" style="background-color: #0f74a8;color: white"href="?ctrl=donhang&act=chitietdonhang&id='.$value['idDH'].'">Xem Chi Tiết</a>
            <a class="btn" style="background-color: #0f74a8;color: white"href="?ctrl=donhang&act=xoadonhang&id='.$value['idDH'].'" onclick="return ConfirmDelete()">Xóa</a>
          </td>
        </tr>';
}
    ?>
<script>
    function ConfirmDelete() {
        var x = confirm("Xóa thiệt hả?");
        if (x)
            return true;
        else
            return false;
    }
</script>
    </tbody>
</table>
