<table class="table table-bordered text-center">
    <thead style="background-color: #35738e;color: #fffcfc;">
    <tr>
        <th scope="col"> Id </th>
        <th scope="col"> Tên Điện Thoại</th>
        <th scope="col"> Hình</th>
        <th scope="col"> Giá</th>
        <th scope="col"> Số Lượng</th>
        <th scope="col"> NSX</th>
        <th scope="col"> Thông số</th>
        <th scope="col"> Trạng thái</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($list == NULL) echo "Chưa có dữ liệu";
    else {
        foreach ($list as $row) {
            $TTDT = $this->model->thuoctinhdt($row['idDT']);
            echo '
            <tr>
              <th scope="row">' . $row['idDT'] . '</th>
              <td>' . $row['TenDT'] . '</td>
              <td><img src="Images/' . $row['urlHinh'] . '" style="width: 100px"></td>
              <td>' . number_format($row['Gia']) . 'VND <br>
              </td>
              <td>' . $row['SoLuongTonKho'] . '</td>
              <td>' . $row['TenNSX'] . '</td>
              <td>
              <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal' . $row['idDT'] . '">
              Xem chi tiết
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal' . $row['idDT'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . $row['TenDT'] . '</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4> Thông số kỹ thuật </h4>
                    <ul class="list-group" style="text-align: justify">
                    ';
                    if ($row['GiaKM']==0) {
                        echo '<li class="list-group-item">Giá khuyến mãi: Không khuyến mãi</li>';
                    }
                        else{
                            echo'<li class="list-group-item">Giá khuyến mãi: '.number_format($row['GiaKM']) . 'VND </li>';
                        }
                    echo'
                        <li class="list-group-item">Màn hình: ' . $TTDT['ManHinh'] . ' </li>
                        <li class="list-group-item">Hệ điều hành: ' . $TTDT['HeDieuHanh'] . ' </li>
                        <li class="list-group-item">Camera sau: ' . $TTDT['CameraSau'] . ' </li>
                        <li class="list-group-item">Camera trước: ' . $TTDT['CameraTruoc'] . '</li>
                        <li class="list-group-item">CPU: ' . $TTDT['CPU'] . ' </li>
                        <li class="list-group-item">RAM: ' . $TTDT['RAM'] . ' </li>
                        <li class="list-group-item">Bộ nhớ trong: ' . $TTDT['BoNhoTrong'] . ' </li>
                        <li class="list-group-item">Thẻ nhớ: ' . $TTDT['TheNho'] . ' </li>
                        <li class="list-group-item">Thẻ SIM: ' . $TTDT['TheSIM'] . ' </li>
                        <li class="list-group-item">Dung lượngPin:' . $TTDT['DungLuongPin'] . '</li>
                    </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
              </td>';
            if ($row['AnHien'] == 1) {
                echo '
            <td> Hiện </td>
            ';
            } else echo '<td> Ẩn </td>';
            echo ' 
              <td><a href="?ctrl=dienthoai&act=edit&idDT=' . $row['idDT'] . '" class="btn btn-success"> Sửa </a></td>
              <td><a href="?ctrl=dienthoai&act=delete&idDT=' . $row['idDT'] . '" class="btn btn-danger" onclick="return ConfirmDelete()"> Xóa </a></td>
         
            </tr>
            ';
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
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $i = 1;
        $total_page = ceil($total['totalrecord'] / $limit);
        while ($i<=$total_page) {
            echo '<li class="page-item"><a class="page-link" href="index.php?ctrl=dienthoai&current_page=' . $i . '">' . $i . '</a></li>
                    ';
            $i++;
        }
        ?>
    </ul>
</nav>