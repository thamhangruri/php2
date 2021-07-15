<table class="table">
    <thead style="background-color: #35738e;color: #fffcfc;">
    <tr class="text-center">
        <th>Id</th>
        <th>Mã điện thoại</th>
        <th>Nội dung</th>
        <th>Thời gian bình luận</th>
        <th>Trạng thái</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ( $showAllComment as $value) {
        echo '<tr class="text-center">
                  <td>' . $value['idBL'] . '</td>
                  <td> ' . $value['idDT'] . '</td>

                  <td> ' . $value['NoiDungBL'] . '</td>
                  <td> ' . $value['ThoiDiemBL'] . '</td>
                  ';
        if($value['AnHien']>0){
            echo '<td>Ẩn</td>';
        }
        else echo '<td>Hiện</td>';
        echo'
                
                  <td>
                    <a class="btn btn-danger" href="?ctrl=binhluan&act=xoabinhluan&id=' . $value['idBL'] . '" onclick="return ConfirmDelete()">Xoá</a>
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
