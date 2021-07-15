<div class="bg-white mt-5 container p-5 mb-5">
    <div class="container">
        <h3>Chi tiết đơn hàng</h3>
        <table class="table border">
            <thead style="background-color: #35738e;color: #fffcfc;">
            <tr class="text-center">
                <th scope="col">Id</th>
                <th scope="col">Tên ĐT</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($getDetail as $value) {
                echo '
    <tr class="text-center">
        <th>' . $value['idDH'] . '</th>
        <td>' . $value['TenDT'] . '</td>
        <td>' . $value['SoLuong'] . '</td>
        <td>' . number_format($value['Gia']) . ' VND</td>
        <td>
            <a class="btn" style="background-color: #0f74a8;color: white" href="?ctrl=home&act=xemdonhang">Xem đơn hàng</a>
        </td>
    </tr>
        ';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
