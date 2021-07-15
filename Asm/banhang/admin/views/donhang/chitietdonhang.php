<table class="table">
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
        echo'
    <tr class="text-center">
        <th>'.$value['idDH'].'</th>
        <td>'.$value['TenDT'].'</td>
        <td>'.$value['SoLuong'].'</td>
        <td>'.number_format($value['Gia']).' VND</td>
        <td>
            <a class="btn" style="background-color: #0f74a8;color: white" href="?ctrl=donhang">Xem đơn hàng</a>
        </td>
    </tr>
        ';
    }
    ?>
    </tbody>
</table>
