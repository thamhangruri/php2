<table class="table table-bordered text-center">
    <thead style="background-color: #35738e;color: #fffcfc;">
        <tr>
          <th scope="col"> STT</th>
          <th scope="col"> Tên NSX </th>
          <th scope="col"></th>
          <th scope="col"></th>
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
              <td>' . $row['TenNSX'] . '</td>
              <td><a href="?ctrl=nhasanxuat&act=edit&idNSX=' . $row['idNSX'] . '" class="btn btn-success"> Sửa </a></td>
              <td><a href="?ctrl=nhasanxuat&act=delete&idNSX=' . $row['idNSX'] . '" class="btn btn-danger" onclick="return ConfirmDelete()"> Xóa </a></td>
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