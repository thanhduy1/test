<?php
    require_once("connection.php");
    $idSanPham = isset($_GET['idsp']) ? $_GET['idsp'] : " ";
    $query_select_SanPham = "SELECT * FROM tbl_sanpham WHERE maSanPham = $idSanPham";
    $result_select_SanPham = $conn->query($query_select_SanPham);

    $SanPham = mysqli_fetch_assoc($result_select_SanPham);
    if($SanPham){
        if(isset($_SESSION['cart'])){
            if(isset($_SESSION['cart'][$idSanPham])){
            $_SESSION['cart'][$idSanPham]['soLuong'] += 1;
            }
            else{
                $_SESSION['cart'][$idSanPham]['soLuong'] = 1;
            }
            $_SESSION['cart'][$idSanPham]['tenSanPham'] = $SanPham['tenSanPham'];
            $_SESSION['cart'][$idSanPham]['giaSanPham'] = $SanPham['giaSanPham'];
            header("location:pageMenu.php");exit();
        }
        else{
            $_SESSION['cart'][$idSanPham]['soLuong'] = 1;
            $_SESSION['cart'][$idSanPham]['tenSanPham'] = $SanPham['tenSanPham'];
            $_SESSION['cart'][$idSanPham]['giaSanPham'] = $SanPham['giaSanPham'];
            header("location:pageMenu.php");exit();
        }
    }
    else{ 
        $_SESSION['nofi'] = 'không tồn tại sản phẩm trong csdl';
    }
        
?>