<?php 
    if(isset($_POST["bookTable"])){
        $hoTenDB = $_POST["hoTenDB"];
        $SDTDB = $_POST["SDTDB"];
        $soNguoi = $_POST["soNguoi"];
        $ngayDB = $_POST["ngayDB"];

        $query_insert_DatBan = "INSERT INTO tbl_datban(IDDatBan,hoTenDB,SDTDB,soNguoi,ngayDB)
         VALUE (' ','$hoTenDB','$SDTDB','$soNguoi','$ngayDB')";
        $result_insert_DatBan = $conn->query($query_insert_DatBan);
        header("location:pageStore.php");
    }

?>

<section class="book_section layout_padding">
    <div class="container">
        <div class="heading_container">
            <h2>
                Đặt bàn
            </h2>
        </div>
        <div class="row">
            <div class="col-md-6">

                <div class="form_container">
                    <form action="" method="post">
                        <div>
                            <input type="text" class="form-control" placeholder="Họ tên" name="hoTenDB" />
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Số điện thoại" name="SDTDB" />
                        </div>
                        <div>
                            <select class="form-control nice-select wide" name="soNguoi">
                                <option value="" disabled selected>
                                    Bạn đi mấy người?
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                                <option value="5">
                                    5
                                </option>
                            </select>
                        </div>
                        <div>
                            <input type="date" class="form-control" name="ngayDB">
                        </div>
                        <div class="btn_box">
                            <button type="submit" name="bookTable">
                                Đặt ngay
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="map_container ">
                    <div class="earth3dmap-com">
                        <iframe id="iframemap"
                            src="https://maps.google.com/maps?q=9.935662%2C+106.341161&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                            width="100%" height="500" frameborder="0" scrolling="no">
                        </iframe>
                        <div
                            style="color: #333; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right; padding: 10px;">
                            Map by <a
                                style="color: #333; text-decoration: underline; font-size: 14px; font-family: Arial, Helvetica, sans-serif; text-align: right;"
                                href="http://earth3dmap.com/?from=embed" target="_blank">Earth3DMap.com</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>