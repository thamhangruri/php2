<table class="table table-bordered text-center">
    <thead style="background-color: #35738e;color: #fffcfc;">
    <tr>
        <th scope="col"> STT </th>
        <th scope="col"> Tên Người dùng </th>
        <th scope="col"> Hình </th>
        <th scope="col"> Email </th>
        <th scope="col"> Tên tài khoản </th>
        <th scope="col"> Vai trò </th>
        <th scope="col"> Trạng Thái </th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($list == NULL) echo "Chưa có dữ liệu";
    else {
        $i = 1;
        foreach ($list as $row) {
            echo '
            <tr>
              <th scope="row">'.$i.'</th>
              <td>' . $row['HoTen'] . '</td>
              <td><img src="Images/' . $row['urlHinh'] . '" style="width: 100px"></td>
              <td>' . $row['Email'] . '</td>
              <td>' . $row['Username'] . '</td>';
              if ($row['VaiTro']==1){
                echo '
                    <td>Quản trị viên</td>
                ';
                }
                else echo '<td>Khách hàng</td>';
              if ($row['AnHien']==1){
                echo '
                    <td> Hiện </td>
                ';
              }
              else echo '<td> Ẩn </td>';
            echo'
              <td><a href="?ctrl=users&act=edit&idUsers=' . $row['idUsers'] . '" class="btn btn-success"> Sửa </a></td>
              <td><a href="?ctrl=users&act=delete&idUsers=' . $row['idUsers'] . '" class="btn btn-danger" onclick="return ConfirmDelete()"> Xóa </a></td>
            </tr>
            ';
            $i++;
        }

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
