<?php
    session_start();
    $is_homepage = false;
    require_once('component/header.php');

    $tukhoa = $_GET['tukhoa'];
    $danhmuc = $_GET['danhmuc'];
?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/banner/banner1.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sản phẩm</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Trang chủ</a>
                            <span>Sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Danh mục sản phẩm</h4>
                            <ul>
                                <?php
                                    $sql_str = "SELECT * FROM danh_muc order by ten_dm";
                                    $result = mysqli_query($conn, $sql_str);
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <li><a href="#"><?=$row['ten_dm']?></a></li>

                                <?php } ?>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <h3>Kết quả tìm kiếm</h3>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <?php 
                                if ($danhmuc == '*'){
                                    $sql_str = "SELECT * FROM san_pham WHERE 
                                            ten_sp LIKE '%$tukhoa%'
                                            OR mo_ta LIKE '%$tukhoa%' 
                                
                                            order by ten_sp";
                                } else {
                                    $sql_str = "SELECT * FROM san_pham WHERE 
                                            id_dm = $danhmuc AND
                                            ten_sp LIKE '%$tukhoa%'
                                            OR mo_ta LIKE '%$tukhoa%' 
                                
                                            order by ten_sp";
                                }
                                
                                $result = mysqli_query($conn, $sql_str);
                            ?>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>Có <span><?=mysqli_num_rows($result)?></span> Sản phẩm</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){
                            $anh_arr = explode(';',$row['anh']);
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?="img/".$anh_arr[0]?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="shop-details.php?id=<?= $row['id_sp'] ?>"><?= $row['ten_sp'] ?></a></h6>
                                    <h5><?=number_format($row['gia'], 0, ',', '.') . '₫'?></h5>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

<?php 
    require_once('component/footer.php');
?>