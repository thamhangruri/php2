<div class="bg-white mt-5 container pb-5 p-5 mb-5">
        <h3>Đơn hàng của tôi</h3>
        <table class="table border">
            <thead style="background-color: #35738e;color: #fffcfc;">
            <tr class="text-center">
                <th scope="col">Mã đơn</th>
                <th scope="col">Tên người nhận</th>
                <th scope="col">SDT</th>
                <th scope="col">Ghi chú</th>
                <th scope="col">PT Thanh toán</th>
                <th scope="col">PT Giao hàng</th>
                <th scope="col">Trạng thái</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($cart as $value) {
                echo '
    <tr class="text-center">
        <th>' . $value['idDH'] . '</th>
        <td>' . $value['TenNguoiNhan'] . '</td>
        <td>' . $value['SDT'] . '</td>
        <td>' . $value['GhiChuCuaKhach'] . '</td>
        <td>' . $value['PhuongThucThanhToan'] . '</td>
        <td>' . $value['PhuongThucGiaoHang'] . '</td>
        ';
                if ($value['TrangThai'] > 0) {
                    echo '<td>Đã giao</td>';
                } else echo '<td>Đang giao</td>';
                echo '
          <td>
            <a class="btn" style="background-color: #0f74a8;color: white"href="?ctrl=home&act=donhangchitiet&id=' . $value['idDH'] . '">Xem Chi Tiết</a>
            ';if ($value['TrangThai'] > 0) {
                    echo '<a class="btn disabled" style="background-color: #0f74a8;color: white"href="?ctrl=donhang&act=xoadonhang&id='.$value['idDH'].'" onclick="return ConfirmDelete()">Hủy Đơn</a>';
                } else echo '<a class="btn " style="background-color: #0f74a8;color: white"href="?ctrl=donhang&act=xoadonhang&id='.$value['idDH'].'" onclick="return ConfirmDelete()">Hủy Đơn</a>';
                echo'
          </td>
        </tr>';
            }
            ?>
            <script>
                function ConfirmDelete() {
                    var x = confirm("Bạn có chắc muốn hủy đơn hay không?");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
            </tbody>
        </table>
</div>

