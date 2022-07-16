<?php
    include('menu.php');
?>
<?php
    $Statement_Order = "SELECT * FROM donhang";
	$Query_Order = mysqli_query($conn, $Statement_Order);
    if (!isset ($_GET['id'])) exit();
    else
	$id = $_GET['id'];
    if ($Display_Order = mysqli_fetch_assoc($Query_Order)){
    $Statement_Users = "SELECT * FROM taikhoan WHERE id =".$id;
    $Query_Users = mysqli_query($conn, $Statement_Users);
	$Display_Users = mysqli_fetch_assoc($Query_Users);
	$St = "SELECT * FROM donhang WHERE idhoadon =".$id;
    $Query = mysqli_query($conn, $St);
    $Dis = mysqli_fetch_assoc($Query); 
    echo "<div >
            <div class='modal-dialog modal-dialog-centered' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Chi Tiết Đơn Hàng</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span >&times;</span>
                        </button>
                    </div>
                    <div class='modal-body'>
						<p class='mb-1'>Mã Đơn Hàng: <span class='text-primary'> TVU$id</span></p>
						<p class='mb-1'>Tên: <span class='text-primary'> $Dis[ten]</span></p>
                        <p class='mb-1'>Số điện thoại: <span class='text-primary'> $Dis[sdt]</span></p>
                        <p class='mb-2'>Địa Chỉ: <span class='text-primary'> $Dis[diachi]</span></p>";
                        
                echo"       <div class='table-responsive'>
                            <table class='table table-centered table-nowrap'>
                                <thead>
                                    <tr>
                                    <th scope='col'>Hình Ảnh</th>
                                    <th scope='col'>Tên Sản Phẩm</th>
                                    <th scope='col'>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>";
                $Statement_OrderDetail = "SELECT * FROM chitiethoadon WHERE idhd =".$id;
                $Query_OrderDetail = mysqli_query($conn, $Statement_OrderDetail);
                $Total=0;
                while($Display_OrderDetail = mysqli_fetch_assoc($Query_OrderDetail)){
                    $Statement_Product = "SELECT * FROM hanghoa WHERE id =".$Display_OrderDetail['idsanpham'];
                    $Query_Product = mysqli_query($conn, $Statement_Product);
					$Display_Product = mysqli_fetch_assoc($Query_Product);
					$gia=$Display_Product['dongia']*$Display_OrderDetail['soluong'];
                    echo "<tr>
                            <th scope='row'>
                                <div>
                                    <img src='$Display_Product[anh]' class='border' width='70px'>
                                </div>
                            </th>
                            <td>
                                <div>
                                    <h5 class='text-truncate font-size-14'>$Display_Product[tenhang]</h5>
                                    <p class='text-muted mb-0'>".number_format($Display_Product['dongia'], 3)."đ x $Display_OrderDetail[soluong]</p>
                                </div>
                            </td>
                            <td>".number_format($gia)."đ</td>
                        </tr>";
                        $Total+= $gia;
                }
                                    echo"<tr>
                                    <td colspan='2'>
                                        <h6 class='m-0 text-right'>Total:</h6>
                                    </td>
                                    <td>
                                    ".number_format($Total)."đ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>";
    }
?>
<?php
    include('footer.php');
?>